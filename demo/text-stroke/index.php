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
            .hajimi-text-heading.hajimi-outline {
                padding: 1.5rem 0;
                perspective: 1000px;
            }
            .hajimi-text-heading.hajimi-outline h1 {
                transform-style: preserve-3d;
                transform: scaleY(0.98);
                text-fill-color: #fff;
                text-stroke: 1px #4F3D95;
                -webkit-text-fill-color: #fff;
                -webkit-text-stroke: 1px #4F3D95;
                /* color: #fff;
                text-shadow: 1px 1px 0 #4F3D95,
                    -1px -1px 0 #4F3D95,  
                    1px -1px 0 #4F3D95,
                    -1px 1px 0 #4F3D95; */
            }
            .hajimi-text-heading.hajimi-outline h1::after {
                content: attr(data-text);
                display: inline-block;
                position: absolute;
                top: 0;
                left: 0;
                font-family: inherit;
                font-size: inherit;
                font-weight: inherit;
                line-height: inherit;
                transform-origin: center top;
                transform: scaleY(1.02);
                text-stroke: 1px rgba(79, 61, 149, 0.75);
                -webkit-text-stroke: 1px rgba(79, 61, 149, 0.75);
                text-fill-color: #fff;
                -webkit-text-fill-color: #fff;
                -moz-text-fill-color: #fff;
                z-index: -1;
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
                <br/>
                <div class="hajimi-text-heading hajimi-outline bg-white"><h1 data-text="SUCCESS">SUCCESS</h1></div>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>