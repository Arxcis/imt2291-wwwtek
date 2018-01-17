<!DOCTYPE html5>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ title }}</title>


  <style>
      
    #images {
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
   
    <section id="images">

      {% for  src in images %}

       <a href="{{ src }}"/>   <img src="{{ src }}"/> <br/>

      {% endfor %}

    </section>
  </main>

</body>
</html>