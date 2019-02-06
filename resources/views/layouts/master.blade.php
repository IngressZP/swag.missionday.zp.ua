<!doctype html>
<html lang="{{ App::getLocale()  }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    @section('title')
        Mission Day Zaporizhzhia Swag Shop
    @show
  </title>

  <!-- seo -->
  <meta property="og:url" content="https://swag.missionday.zp.ua">
  <meta property="og:type" content="website">
  <meta property="og:title" content="MD Zaporizhzhia Swag Shop - Mission Day Zaporizhzhia 26 May 2018">
  <meta property="og:description" content="Agents, we want to discover Zaporizhzhia on Saturday 26 May 2018. In collaboration with the City of Zaporizhzhia we will provide you high quality missions to explore the city on foot together. Sign up to receive more information soon.">
  <meta property="og:image" content="http://missionday.zp.ua/assets/img/md-promo.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:locale" content="uk_UA">
  <meta property="og:updated_time" content="2018-04-14T02:52:00+0300">

  <meta name="keywords" content="Missionday, Zaporizhzhia, ingress, resistance, enl, res">
  <meta name="description" content="Agents, we want to discover Zaporizhzhia on Saturday 26 May 2018. In collaboration with the City of Zaporizhzhia we will provide you high quality missions to explore the city on foot together. Sign up to receive more information soon.">

  <meta name="twitter:image" content="http://missionday.zp.ua/assets/img/md-promo.jpg">
  <meta name="twitter:title" content="MD Zaporizhzhia Swag Shop">
  <meta name="twitter:url"  content="https://swag.missionday.zp.ua/">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:description" content="Agents, we want to discover Zaporizhzhia on Saturday 26 May 2018. In collaboration with the City of Zaporizhzhia we will provide you high quality missions to explore the city on foot together. Sign up to receive more information soon.">

  <!-- css / fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

  <!-- Main stylesheet -->
  <link rel="stylesheet" href="/css/main.min.css">

  <!-- favicon -->
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

  <meta name="theme-color" content="#ea5b0c"> <!-- will change the adressbar color on android chrome -->
</head>
<body>
  @yield('content')

  @section('scripts')
    <script src="/js/main.min.js"></script>
  @show
</body>
</html>
