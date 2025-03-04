<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asset Value Breakdown Calculator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      padding: 20px;
      text-align: center;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .tabs {
      display: flex;
      justify-content: space-around;
      margin-bottom: 10px;
    }
    .tab {
      padding: 10px 20px;
      background-color: #ddd;
      cursor: pointer;
      border-radius: 5px;
      transition: 0.3s;
    }
    .tab.active {
      background-color: #4CAF50;
      color: white;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }
    input[type="number"] {
      width: 90%;
      padding: 5px;

    }
    button {
      margin-top: 15px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background-color: #45a049;
    }
    #receiptImage {
      display: none;
      max-width: 100%;
      margin-top: 20px;
    }
    #receiptModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.7);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 80%;
      max-height: 80%;
      overflow: auto;
      position: relative;
    }
    .close-modal {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Asset Value and Payment Breakdown Calculator</h2>

    <div class="tabs">
      <div class="tab active" data-tab="house">House</div>
      <div class="tab" data-tab="car">Car</div>
      <div class="tab" data-tab="land">Land</div>
    </div>

    <div id="house" class="tab-content active">
      <table>
        <tr>
          <th>Price (₱)</th>
          <th>Interest Rate (%)</th>
          <th>Loan Term (Years)</th>
          <th>Monthly Payment (₱)</th>
          <th>Total Payment (₱)</th>
        </tr>
        <tr>
          <td><input type="number" id="housePrice"></td>
          <td><input type="number" id="houseInterest"></td>
          <td><input type="number" id="houseTerm"></td>
          <td id="houseMonthly">0</td>
          <td id="houseTotal">0</td>
        </tr>
      </table>
    </div>

    <div id="car" class="tab-content">
      <table>
        <tr>
          <th>Price (₱)</th>
          <th>Interest Rate (%)</th>
          <th>Loan Term (Years)</th>
          <th>Monthly Payment (₱)</th>
          <th>Total Payment (₱)</th>
        </tr>
        <tr>
          <td><input type="number" id="carPrice"></td>
          <td><input type="number" id="carInterest"></td>
          <td><input type="number" id="carTerm"></td>
          <td id="carMonthly">0</td>
          <td id="carTotal">0</td>
        </tr>
      </table>
    </div>

    <div id="land" class="tab-content">
      <table>
        <tr>
          <th>Price (₱)</th>
          <th>Interest Rate (%)</th>
          <th>Loan Term (Years)</th>
          <th>Monthly Payment (₱)</th>
          <th>Total Payment (₱)</th>
        </tr>
        <tr>
          <td><input type="number" id="landPrice"></td>
          <td><input type="number" id="landInterest"></td>
          <td><input type="number" id="landTerm"></td>
          <td id="landMonthly">0</td>
          <td id="landTotal">0</td>
        </tr>
      </table>
    </div>

    <button id="calculate">Calculate Payments</button>
    <button id="receipt">Generate Receipt</button>
  </div>

  <div id="receiptModal">
    <div class="modal-content">
      <span class="close-modal">&times;</span>
      <img id="receiptImage" alt="Receipt">
      <a id="downloadLink" download="receipt.jpg" style="display: block; margin-top: 15px; text-align: center;">Download Receipt</a>
    </div>
  </div>

  <script>
    document.querySelectorAll('.tab').forEach(tab => {
      tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
        tab.classList.add('active');
        document.getElementById(tab.dataset.tab).classList.add('active');
      });
    });

    function calculatePayments(id) {
      let price = parseFloat(document.getElementById(id + 'Price').value) || 0;
      let rate = parseFloat(document.getElementById(id + 'Interest').value) || 0;
      let term = parseFloat(document.getElementById(id + 'Term').value) || 0;
      let monthlyRate = rate / 100 / 12;
      let months = term * 12;
      let monthlyPayment = (price * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -months));
      let totalPayment = monthlyPayment * months;
      document.getElementById(id + 'Monthly').textContent = isNaN(monthlyPayment) ? '0' : monthlyPayment.toFixed(2);
      document.getElementById(id + 'Total').textContent = isNaN(totalPayment) ? '0' : totalPayment.toFixed(2);
    }

    document.getElementById('calculate').addEventListener('click', () => {
      ['house', 'car', 'land'].forEach(calculatePayments);
    });

    document.getElementById('receipt').addEventListener('click', () => {
      let activeTab = document.querySelector('.tab.active').dataset.tab;
      let price = document.getElementById(activeTab + 'Price').value || 0;
      let interest = document.getElementById(activeTab + 'Interest').value || 0;
      let term = document.getElementById(activeTab + 'Term').value || 0;
      let monthly = document.getElementById(activeTab + 'Monthly').textContent;
      let total = document.getElementById(activeTab + 'Total').textContent;
      
      // Create a canvas to generate the receipt image
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      canvas.width = 600;
      canvas.height = 400;
      
      // Set background
      ctx.fillStyle = '#ffffff';
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      
      // Add border
      ctx.strokeStyle = '#4CAF50';
      ctx.lineWidth = 10;
      ctx.strokeRect(5, 5, canvas.width - 10, canvas.height - 10);
      
      // Set text style
      ctx.fillStyle = '#000000';
      ctx.font = 'bold 24px Arial';
      ctx.textAlign = 'center';
      
      // Draw header
      ctx.fillText('RECEIPT', canvas.width / 2, 50);
      
      // Draw date
      const date = new Date();
      ctx.font = '14px Arial';
      ctx.textAlign = 'right';
      ctx.fillText(`Date: ${date.toLocaleDateString()}`, canvas.width - 30, 80);
      
      // Draw content
      ctx.font = '16px Arial';
      ctx.textAlign = 'left';
      const startY = 120;
      const lineHeight = 30;
      
      ctx.fillText(`Asset Type: ${activeTab.charAt(0).toUpperCase() + activeTab.slice(1)}`, 30, startY);
      ctx.fillText(`Price: ₱${price}`, 30, startY + lineHeight);
      ctx.fillText(`Interest Rate: ${interest}%`, 30, startY + lineHeight * 2);
      ctx.fillText(`Term: ${term} years`, 30, startY + lineHeight * 3);
      ctx.fillText(`Monthly Payment: ₱${monthly}`, 30, startY + lineHeight * 4);
      ctx.fillText(`Total Payment: ₱${total}`, 30, startY + lineHeight * 5);
      
      // Convert canvas to JPEG image
      const imageUrl = canvas.toDataURL('image/jpeg');
      
      // Display the image in modal
      const receiptImage = document.getElementById('receiptImage');
      receiptImage.src = imageUrl;
      receiptImage.style.display = 'block';
      
      // Set download link
      const downloadLink = document.getElementById('downloadLink');
      downloadLink.href = imageUrl;
      
      // Show modal
      const modal = document.getElementById('receiptModal');
      modal.style.display = 'flex';
    });
    
    // Close modal when clicked on X or outside the modal
    document.querySelector('.close-modal').addEventListener('click', () => {
      document.getElementById('receiptModal').style.display = 'none';
    });
    
    window.addEventListener('click', (event) => {
      const modal = document.getElementById('receiptModal');
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
  </script>
</body>
</html>