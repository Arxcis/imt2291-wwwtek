<!DOCTYPE html5>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ title }}</title>


  <style>
      
    #imagecontainer {
      display: flex;
      flex-wrap: wrap;
    }

  </style>

</head>
<body>
  <header>
    <h1>{{ title }}</h1>
  </header>

  <main>
      
    <p> Her er hovedbodyen! </p>
    <div id="imagecontainer">

      {% for  src in images %}

       <a href="{{ src }}"/>   <img src="{{ src }}"/> <br/>

      {% endfor %}

    </div>
  </main>

</body>
</html>