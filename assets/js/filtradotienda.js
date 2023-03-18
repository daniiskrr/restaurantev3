// Crea un objeto de productos
const productos = [
    {
      nombre: "Producto 1",
      categoria: "categoria1",
      precio: 10,
      stock: 5
    },
    {
      nombre: "Producto 2",
      categoria: "categoria2",
      precio: 20,
      stock: 10
    },
    {
      nombre: "Producto 3",
      categoria: "categoria1",
      precio: 15,
      stock: 8
    },
    {
      nombre: "Producto 4",
      categoria: "categoria3",
      precio: 5,
      stock: 3
    }
  ];
  
  // Crea una función para mostrar los productos en la página web
  function mostrarProductos(productos) {
    const productosContainer = document.getElementById("productos-container");
    productosContainer.innerHTML = "";
    productos.forEach(producto => {
      const productoElement = document.createElement("div");
      productoElement.innerHTML = `
        <h2>${producto.nombre}</h2>
        <p>Categoría: ${producto.categoria}</p>
        <p>Precio: $${producto.precio}</p>
        <p>Stock: ${producto.stock}</p>
      `;
      productosContainer.appendChild(productoElement);
    });
  }
  
  // Muestra todos los productos al cargar la página
  mostrarProductos(productos);
  
  // Agrega un formulario para los filtros
  const filtrosForm = document.getElementById("filtros-form");
  filtrosForm.addEventListener("change", () => {
    // Obtiene los valores de los filtros
    const categoriaFiltro = filtrosForm.elements.categoria.value;
    const precioMinFiltro = parseFloat(filtrosForm.elements.precioMin.value);
    const precioMaxFiltro = parseFloat(filtrosForm.elements.precioMax.value);
  
    // Filtra los productos según los valores de los filtros
    const productosFiltrados = productos.filter(producto => {
      return (!categoriaFiltro || producto.categoria === categoriaFiltro) &&
             (!precioMinFiltro || producto.precio >= precioMinFiltro) &&
             (!precioMaxFiltro || producto.precio <= precioMaxFiltro);
    });
  
    // Muestra los productos filtrados en la página
    mostrarProductos(productosFiltrados);
  });