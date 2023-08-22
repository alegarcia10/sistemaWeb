<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remito</title>
</head>
<body>
    <div class="header">
        <div class="header-box">
            <h2>Cuadro 1</h2>
            <p>Contenido del Cuadro 1</p>
        </div>
        <div class="header-box">
            <h2>Cuadro 2</h2>
            <p>Contenido del Cuadro 2</p>
        </div>
    </div>
    
    <div class="customer-box">
        <h2>Datos del Cliente</h2>
        <label for="cliente">Cliente:</label>
        <input type="text" id="cliente" name="cliente"><br>
        
        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio"><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono"><br>
    </div>
    
    <div class="products-box">
        <h2>Lista de Productos</h2>
        <ul class="products-list">
            <li>Producto 1</li>
            <li>Producto 2</li>
            <li>Producto 3</li>
        </ul>
    </div>
    
    <form>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

<style>
        .header {
            display: flex;
            justify-content: space-between;
            background-color: lightgray;
            padding: 10px;
        }
        .customer-box, .products-box {
            border: 1px solid black;
            padding: 10px;
            margin: 10px 0;
        }
        .products-list {
            list-style-type: none;
            padding: 0;
        }
        .products-list li {
            margin-bottom: 5px;
        }
    </style>
