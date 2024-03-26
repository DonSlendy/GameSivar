document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = "dashboard.php"; // Redireccionar al dashboard si el inicio de sesión es exitoso
                } else {
                    document.getElementById("error-message").innerText = response.message;
                }
            } else {
                console.error("Hubo un error al procesar la solicitud.");
            }
        }
    };
    
    xhr.open("POST", this.action, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(new URLSearchParams(formData).toString());
});
