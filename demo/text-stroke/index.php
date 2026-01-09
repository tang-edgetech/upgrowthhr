<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <style type="text/css">
            * {
                box-sizing: border-box;
                position: relative;
            }
            html, body {
                font-family: 'Inter', sans-serif;
                padding: 0;
                margin: 0;
                font-size: 1rem;
                line-height: 1.5rem;
                text-rendering: optimizeLegibility;
                -webkit-font-smoothing: antialiased;
            }
            h1, h2, h3, h4, h5, h6 {
                margin: 0;
            }
            .app {
                display: flex;
                flex-direction: column;
                align-items: center;
                min-height: 100vh;
                background-color: #4F3D95;
                padding-top: 3.125rem;
            }
            .main-content {
                flex: 1;
                max-width: 1240px;
                width: 100%;
            }
            .hajimi-text-heading {
                display: block;
                margin-bottom: 1.5rem;
            }
            .hajimi-text-heading h1 {
                display: inline-block;
                width: max-content;
                font-size: 140px;
                line-height: 100px;
                font-weight: 900;
                letter-spacing: 0.02em;
                color: #fff;
            }
            .hajimi-text-heading.text-outline h1 {
                color: #4F3D95;
                text-shadow:
                    1px 1px 0 #fff,
                    -1px -1px 0 #fff,  
                    1px -1px 0 #fff,
                    -1px 1px 0 #fff;
                
                    /* -moz-text-fill-color: transparent;
                -webkit-text-fill-color: transparent;
                    -moz-text-stroke-color: #333;
                -webkit-text-stroke-color: #333;
                    -moz-text-stroke-width: 1px;  
                -webkit-text-stroke-width: 1px; */
            }
            .hajimi-text-heading.text-shadow {
                padding: 1rem;
            }
            .hajimi-text-heading.text-shadow h1 {
                color: #4F3D95;
                text-shadow: 0 4px 0 #A581FF;
            }
            .bg-white {
                background-color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="app">
            <div class="main-content">
                <div class="hajimi-text-heading"><h1>BE BOLD</h1></div>
                <div class="hajimi-text-heading text-outline"><h1>BE UPGROWTH</h1></div>
                <br/>
                <div class="hajimi-text-heading text-shadow bg-white"><h1>SUCCESS</h1></div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>