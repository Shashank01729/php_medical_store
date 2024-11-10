// script.js
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const content = document.querySelector('.content');
    
    sidebar.classList.toggle('expanded');
    content.classList.toggle('shifted');
}

function loadContent(page) {
    const contentArea = document.getElementById('content-area');
    switch (page) {
        case 'home':
            contentArea.innerHTML = `<h1>Welcome to Our Medical Center</h1><p>We provide comprehensive health services and are dedicated to patient care.</p>`;
            break;
        case 'about':
            contentArea.innerHTML = `<h1>About Us</h1><p>Our medical center has been serving the community with top-notch healthcare services for over 20 years.</p>`;
            break;
        case 'contact':
            contentArea.innerHTML = `<h1>Contact Us</h1><p>Reach out to us at contact@medicalcenter.com or call us at (123) 456-7890.</p>`;
            break;
        case 'invoice':
            contentArea.innerHTML = `
                <h1>Invoice Generator</h1>
                <form id="invoiceForm">
                    <label for="name">Patient Name:</label>
                    <input type="text" id="name" name="name" required><br>

                    <label for="services">Services:</label>
                    <input type="text" id="services" name="services" required><br>

                    <label for="amount">Amount:</label>
                    <input type="number" id="amount" name="amount" required><br>

                    <label for="discount">Discount (%):</label>
                    <input type="number" id="discount" name="discount" value="0"><br>

                    <label for="tax">Tax (%):</label>
                    <input type="number" id="tax" name="tax" value="0"><br>

                    <button type="button" onclick="generatePDF()">Download Invoice</button>
                </form>`;
            break;
    }

    toggleSidebar();
}

function generatePDF() {
    const form = document.getElementById('invoiceForm');
    const formData = new FormData(form);

    const amount = parseFloat(formData.get('amount'));
    const discount = parseFloat(formData.get('discount')) || 0;
    const tax = parseFloat(formData.get('tax')) || 0;

    const discountAmount = (amount * discount) / 100;
    const taxAmount = (amount * tax) / 100;
    const totalAmount = amount - discountAmount + taxAmount;

    formData.append('totalAmount', totalAmount.toFixed(2));

    fetch('generate_invoice.php', {
        method: 'POST',
        body: formData,
    }).then(response => response.blob())
      .then(blob => {
          const link = document.createElement('a');
          link.href = window.URL.createObjectURL(blob);
          link.download = 'invoice.pdf';
          link.click();
      });
}
