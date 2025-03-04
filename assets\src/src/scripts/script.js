function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
}

document.addEventListener("DOMContentLoaded", function () {
    const wineSections = document.querySelectorAll(".wine-section");
    const aboutBlocks = document.querySelectorAll(".about-block");

    function checkScroll() {
        wineSections.forEach((section) => {
            const sectionPosition = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            
            console.log(`Section position: ${sectionPosition}, Window height: ${windowHeight}`);

            if (sectionPosition < windowHeight - 100) {
                section.classList.add("show");
            }
        });

        
        aboutBlocks.forEach((block, index) => {
            const blockPosition = block.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (blockPosition < windowHeight - 100) {
                
                block.classList.add("show");
               
                if (index % 2 === 0) {
                    block.classList.add("from-left");
                } else {
                    block.classList.add("from-right");
                }
            }
        });
    }

    window.addEventListener("scroll", checkScroll);
    checkScroll(); 

    
    if (localStorage.getItem("bookingSuccess") === "true") {
        
        let messageDiv = document.createElement("div");
        messageDiv.textContent = "Booking Submitted Successfully.";
        messageDiv.classList.add("success-popup");
        document.body.appendChild(messageDiv);

        
        setTimeout(() => {
            messageDiv.style.opacity = "0";
            setTimeout(() => messageDiv.remove(), 500); 
        }, 5000);

        
        localStorage.removeItem("bookingSuccess");
    }
});

function getWineDescription() {
    var customerInput = document.getElementById("customerInput").value;
    var descriptionResult = document.getElementById("descriptionResult");

    
    descriptionResult.innerHTML = `<p><strong>You:</strong> ${customerInput}</p>`;

    
    fetch('wine-description.php', { 
        method: 'POST',
        body: new URLSearchParams({
            'customer_input': customerInput
        }),
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    })
    .then(response => response.text())
    .then(data => {
        
        descriptionResult.innerHTML += `<p><strong>AI's Description:</strong> ${data}</p>`;
    });
}
