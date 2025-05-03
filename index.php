<?php
    $userData = [
        'username' => 'nicolee.palomino',
        'jobTitle' => 'Analista de Datos & Desarrollador Web',
        'profileImage' => 'https://i.postimg.cc/26jJNnbN/my-photo.png', // URL de la imagen de perfil
        'links' => [
            ['title' => 'Mi Portafolio', 'url' => 'https://nicole-palomino.github.io/portafolio/', 'icon' => 'briefcase'],
            ['title' => 'Mi Blog', 'url' => 'https://devfut.blogspot.com/', 'icon' => 'edit'],
            ['title' => 'Descarga Mi CV', 'url' => 'https://drive.google.com/uc?export=download&id=1YVJKkCtVtxK1e2yoAv9x_RDIU17KEREi', 'icon' => 'download']
        ],
        'theme' => 'pink' // Tema por defecto
    ];

    // Cambiar tema si se envía por GET
    if (isset($_GET['theme']) && in_array($_GET['theme'], ['pink', 'blue', 'green', 'orange', 'dark'])) {
        $userData['theme'] = $_GET['theme'];
        // En un entorno real, guardaríamos esto en una cookie o sesión
        setcookie('user_theme', $_GET['theme'], time() + (86400 * 30), "/"); // Cookie por 30 días
    }
    // Recuperar tema de cookie si existe
    else if (isset($_COOKIE['user_theme'])) {
        $userData['theme'] = $_COOKIE['user_theme'];
    }

    // Función para generar las clases CSS según el tema seleccionado
    function getThemeStyles($theme) {
        $themeStyles = [
            'pink' => [
                'background' => 'linear-gradient(135deg, #8a2be2, #ee82ee)',
                'primary' => '#ec4899',
                'hover' => 'rgba(236, 72, 153, 0.15)'
            ],
            'blue' => [
                'background' => 'linear-gradient(135deg, #1e3c72, #2a5298)',
                'primary' => '#3b82f6',
                'hover' => 'rgba(59, 130, 246, 0.15)'
            ],
            'green' => [
                'background' => 'linear-gradient(135deg, #134e5e, #71b280)',
                'primary' => '#10b981',
                'hover' => 'rgba(16, 185, 129, 0.15)'
            ],
            'orange' => [
                'background' => 'linear-gradient(135deg, #f12711, #f5af19)',
                'primary' => '#f97316',
                'hover' => 'rgba(249, 115, 22, 0.15)'
            ],
            'dark' => [
                'background' => 'linear-gradient(135deg, #232526, #414345)',
                'primary' => '#1f2937',
                'hover' => 'rgba(31, 41, 55, 0.15)'
            ]
        ];
        
        return $themeStyles[$theme] ?? $themeStyles['pink'];
    }

    $themeStyles = getThemeStyles($userData['theme']);

    $icons = [
        'external' => '<svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>',
        'twitter' => '<svg class="social-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path></svg>',
        'instagram' => '<svg class="social-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
        'github' => '<svg class="social-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>',
        'linkedin' => '<svg class="social-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
        'globe' => '<svg class="link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
        'briefcase' => '<svg class="link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>',
        'edit' => '<svg class="link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>',
        'download' => '<svg class="link-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
    ];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCIAL MEDIA HUB | NICOLE PALOMINO</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --theme-primary: <?php echo $themeStyles['primary']; ?>;
            --theme-hover: <?php echo $themeStyles['hover']; ?>;
        }

        body {
            background: <?php echo $themeStyles['background']; ?>;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.6s cubic-bezier(0.22, 1, 0.36, 1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-content">
            <div class="avatar-container">
                <img src="<?php echo htmlspecialchars($userData['profileImage']); ?>" alt="Foto de perfil" class="avatar">
            </div>

            <h2 class="username">@<?php echo htmlspecialchars($userData['username']); ?></h2>
            
            <p class="job-title"><?php echo htmlspecialchars($userData['jobTitle']); ?></p>

            <div class="theme-selector">
                <p>Elige un tema:</p>
                <div class="theme-colors">
                    <?php foreach (['pink', 'blue', 'green', 'orange', 'dark'] as $theme): ?>
                    <a href="?theme=<?php echo $theme; ?>">
                        <div class="theme-color <?php echo $theme; ?> <?php echo ($userData['theme'] === $theme) ? 'active' : ''; ?>"></div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="links-container">
                <?php foreach ($userData['links'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>" class="link-button" target="_blank">
                    <div class="link-title">
                        <?php echo isset($icons[$link['icon']]) ? $icons[$link['icon']] : ''; ?>
                        <span><?php echo htmlspecialchars($link['title']); ?></span>
                    </div>
                    <?php echo $icons['external']; ?>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="social-icons">
                <a href="https://x.com/aless_palomino" class="social-link" target="_blank"><?php echo $icons['twitter']; ?></a>
                <a href="https://www.instagram.com/nicolee.palomino/" class="social-link" target="_blank"><?php echo $icons['instagram']; ?></a>
                <a href="https://github.com/Nicole-Palomino" class="social-link" target="_blank"><?php echo $icons['github']; ?></a>
                <a href="https://www.linkedin.com/in/nicole-palomino-alvarado/" class="social-link" target="_blank"><?php echo $icons['linkedin']; ?></a>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>