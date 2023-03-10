<div class="right backcolor">
  <div class="buttons">

    <button class="button-6" role="button"><i class="fa-solid fa-bell"></i></button>
    <livewire:logout></livewire:logout>
  </div>

  <div class="flex">
    <h3 style='color:black'>Report </h3>  <span>on this week</span>
</div>
<div id="my-pie-chart-container">
    
    <div id="my-pie-chart"></div>
  
    <div id="legenda">
      <div class="entry">
        <div  class="entry-color" style="background-color:#7C5FED"></div>
        <div class="entry-text">Sel</div>
      </div>
      

      <div class="entry">
        <div  class="entry-color" style="background-color:#FFECD1"></div>
        <div class="entry-text">Farine</div>
      </div>

      <div class="entry">
        <div  class="entry-color" style="background-color:#FB9300"></div>
        <div class="entry-text">Eau</div>
      </div>


      <div class="entry">
        <div  class="entry-color" style="background-color:#00A650"></div>
        <div class="entry-text">Cumin</div>
      </div>
    </div>
  </div>

  <div class="report">
    
    
        <div class="flexreport">
            <div style="height:20px;width:20px;;background-color: #7C5FED;border-radius: 50% 20% / 10% 40%;"></div>
            <div style="margin: 20px;">Agenda(120 euros)</div>
    
            <div style="height:20px;width:20px;;background-color: #FFECD1;border-radius: 50% 20% / 10% 40%;"></div>
            <div style="margin: 20px;">Inventaire (235 euros)</div>
        </div>
        <div class="flexreport">
            <div style="height:20px;width:20px;;background-color: #FB9300;border-radius: 50% 20% / 10% 40%;"></div>
            <div style="margin: 20px;">Ingredient(SEL)</div>
        
            <div style="height:20px;width:20px;;background-color: #00A650;border-radius: 50% 20% / 10% 40%;"></div>
            <div style="margin: 20px;">Recette(Omelette)</div>
        </div>

  </div>
  <div class="suggestions">
    <div class="flex">
        <h3 style='color:#1C1146'>Communaut√© </h3>
    </div>
  


  <div style="display:flex;justify-content:space-around;margin:10px;gap:6px">
    <div style="background-color: #FFF9F3;border-radius:5px;width:50%;display:flex;justify-content:center;flex-direction:column;align-items: center;">
        <img src="{{ asset('images/food.png') }}" class="imagerotate" alt="" height="100" width="100">
        <h2 style="color:#3B315D;letter-spacing: -1px;font-size:larger"> Omelette </h2>
        <p style="color:#3F3560;font-size:smaller"> Cout : X </p>
       
    </div>
    <div style="background-color: #FFF9F3;border-radius:5px;width:50%;display:flex;justify-content:center;flex-direction:column;align-items: center;">
        <img src="{{ asset('images/food.png') }}" class="imagerotate" alt="" height="100" width="100">
        <h2 style="color:#3B315D;letter-spacing: -1px;font-size:larger"> Tarte citron </h2>
        <p style="color:#3F3560;font-size:smaller"> Cout : X </p>
        
    </div>

  </div>

  
  
    </div>
</div>



