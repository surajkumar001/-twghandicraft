   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <style>

.navbarx {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbarx a {
  float: left;
  font-size: 13px;
  color: white;
  text-align: center;
  padding: 8px 8px;
  text-decoration: none;
}

.dropdownx {
  float: left;
  overflow: inherit;
}

.dropdownx .dropbtnx {
  font-size: 13px;  
  border: none;
  outline: none;
  color: white;
  padding: 8px 8px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.navbarx a:hover, .dropdownx:hover .dropbtnx {
  background-color: red;
}

.dropdown-contentx {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 100%;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-contentx .headerx {
  background: red;
  padding: 16px;
  color: white;
}

.dropdownx:hover .dropdown-contentx {
  display: block;
}

/* Create three equal columns that floats next to each other */
.column {

  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #ccc;
  height: 250px;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: #ddd;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    height: auto;
  }
}


</style>



<!-- ============================================== NAVBAR ============================================== -->
      <div class="">     
<div class="navbarx">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdownx">
    <button class="dropbtnx">Dropdown 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-contentx">
      <!-- <div class="headerx">
        <h2>Mega Menu</h2>
      </div>  --> 
       <div class="container-fluid">    
      <div class="row">
        <div class="column">
          <h3>Category 1</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 2</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 3</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
  </div>
    </div>
  </div> 
</div>
   </div>         
       
<!-- ============================================== NAVBAR : END ============================================== -->
</header>