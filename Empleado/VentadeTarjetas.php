<!DOCTYPE html>
<html lang="es">

<head>
    <title>Venta de tarjetas</title>
    <?php require("../HeaderFooter/cabezal.php") ?>

</head>

<body id="home" class="homepage">
    <?php require("navbar.php"); ?>

    <section id="contact-area">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Venta de Tarjetas!</h2>
                    <p class="text-center wow fadeInDown animated" style="visibility: visible;">Para ingresar a nuestros juegos y servicios, compra una tarjeta de tu eleccion.</p>
                </div>
                <form id="main-contact-form" name="contact-form" method="post" action="InsertarTarjeta.php">
                    <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">
                        <div class="form-group">
                            <label for="email">Correo del Cliente</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="productSelect">Tarjetas</label>
                            <select id="productSelect" name="product" class="form-control" required>
                                <option selected value="300">Gold </option>
                                <option value="150">Silver </option>
                                <option value="50">Plus </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 animated animate-from-right" style="opacity: 1; right: 0px;">
                        <div class="form-group">
                            <label for="totalPrice">Total Price</label>
                            <input value="300" type="text" id="totalPrice" class="form-control" readonly>
                            <span id="totalPriceDisplay">Total: $300</span> <!-- Aquí se mostrará el total acumulado -->
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Procesar Compra</button>
                        <button id="limpiar" type="button" class="btn btn-primary btn-lg btn-send-msg" onclick="limpiarFormulario()">Limpiar</button>
                    </div>
                </form>

                <script>
                    document.getElementById('productSelect').addEventListener('change', function() {
                        var precio = this.value;
                        var display = document.getElementById('totalPriceDisplay');
                        var inputPrice = document.getElementById('totalPrice');
                        if (precio) {
                            display.innerHTML = 'Total: $' + precio;
                            inputPrice.value = precio;
                        } else {
                            display.innerHTML = 'Total: $0';
                            inputPrice.value = '';
                        }
                    });

                    function limpiarFormulario() {
                        document.getElementById('main-contact-form').reset();
                        document.getElementById('totalPriceDisplay').innerHTML = 'Total: $300';
                        document.getElementById('totalPrice').value = '300';
                    }
                </script>



    </section><!--/#bottom-->

    <?php require("../HeaderFooter/footer.php"); ?>
</body>

</html>