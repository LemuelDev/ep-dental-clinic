<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{env('APP_NAME')}} (LOGIN)</title>
  @vite('resources/css/app.css')
  @vite('resources/js/lightDark.js')

</head>
<body class="min-h-screen">
  <!-- Add your theme toggle button anywhere in the body -->
  <input type="checkbox" value="synthwave" class="toggle theme-controller" id="theme-toggle" />
  
  
</body>
</html>
