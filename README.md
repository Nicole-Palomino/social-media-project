# Social Media Hub

## 📱 Descripción
Social Media Hub es una página web personal que funciona como un centro de enlaces sociales y profesionales, diseñada para centralizar y compartir fácilmente todos tus perfiles y recursos en línea. El proyecto está inspirado en plataformas como Linktree, pero con características personalizadas y un diseño moderno.

## ✨ Características Principales

- **Perfil Personalizado**: Muestra tu foto de perfil, nombre de usuario y título profesional.
- **Enlaces Destacados**: Sección para tus enlaces más importantes (portafolio, blog, CV, etc.).
- **Selector de Temas**: 5 temas de color diferentes para personalizar la apariencia:
  - Rosa (predeterminado)
  - Azul
  - Verde
  - Naranja
  - Oscuro
- **Iconos SVG**: Uso de iconos vectoriales para una apariencia nítida en cualquier resolución.
- **Diseño Responsivo**: Adaptable a cualquier dispositivo y tamaño de pantalla.
- **Persistencia de Tema**: El tema seleccionado se guarda en cookies para mantener la preferencia del usuario.

## 🛠️ Tecnologías Utilizadas

- **PHP**: Para la lógica del servidor y manejo de datos
- **HTML5**: Estructura semántica del contenido
- **CSS3**: Estilos y animaciones
- **JavaScript**: Interactividad y mejoras en la experiencia de usuario
- **Google Fonts**: Fuente Poppins para una tipografía moderna

## 🚀 Instalación

1. Clona este repositorio en tu servidor local:
```bash
git clone [URL-del-repositorio]
```

2. Asegúrate de tener un servidor web con PHP instalado (como Apache, Nginx, o XAMPP).

3. Coloca el proyecto en el directorio raíz de tu servidor web.

4. Accede al proyecto a través de tu navegador web:
```
http://localhost/social-media-project
```

## 🎨 Personalización

Para personalizar el hub con tu información, modifica el array `$userData` en el archivo `index.php`:

```php
$userData = [
    'username' => 'tu.usuario',
    'jobTitle' => 'Tu Título Profesional',
    'profileImage' => 'URL-de-tu-imagen',
    'links' => [
        ['title' => 'Título del Enlace', 'url' => 'URL-del-enlace', 'icon' => 'nombre-del-icono'],
        // Añade más enlaces según necesites
    ],
    'theme' => 'pink' // Tema por defecto
];
```

## 📁 Estructura del Proyecto

```
social-media-project/
├── css/
│   └── style.css
├── img/
│   └── icono.png
├── js/
│   └── main.js
├── index.php
└── README.md
```

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Si encuentras un bug o tienes una sugerencia, por favor abre un issue o envía un pull request.

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - mira el archivo LICENSE para más detalles.

## 👩‍💻 Autor

- **Nicole Palomino** - [GitHub](https://github.com/Nicole-Palomino)
