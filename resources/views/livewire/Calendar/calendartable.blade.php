<style>
    .container {
        width:100%;
        margin: 50px;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(10, 1fr);
        gap: 30px;
        grid-auto-flow: row;
        grid-template-areas:
    "left Header Header Header Header"
    "left Header Header Header Header"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data"
    "left first-data first-data first-data first-data";
    }
    .first-data{
        display:flex;
    }
    #month-calendar{
        width: 100%;
    }

    .month{
        margin: 0;
        padding: 3rem 2rem 2rem;
        background: #96A998;
        text-align: center;

        color: #ffffff;
        list-style: none;
    }

    .month li{
        padding: 0;
        margin: 0;
        font-size: 1.5rem;
        line-height: 1.4;
        letter-spacing: 0.1rem;
        text-transform: uppercase;
        font-weight: 700;
    }

    .month li.prev,
    .month li.next{
        cursor: pointer;
    }

    .month li.prev{
        float: left;
    }

    .month li.next{
        float: right;
    }

    .month li{
        font-size: 1.2rem;
        font-weight: 400;
    }

    /* дни недели */
    .weekdays{
        margin: 0;
        padding: 1rem 0;
        background-color:#CDE3CF ;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: left;
        color: #ffffff;
    }

    .weekdays li{
        display: inline-block;
        flex: 0 0 calc(100% / 7);
        text-align: center;
    }

    /* дни */
    .days{
        text-decoration: none;
        margin: 0;
        padding: 1rem 0;
        background-color: #EEF6EF;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: left;
        align-content: flex-start;
        height: 14rem;
    }

    .days li{
        text-align: justify;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-content: center;
        flex-wrap: wrap;
        justify-content: space-between;;
        text-decoration: none;
        flex: 0 0 calc(100% / 7);

    }

    .days li.date-now{
        color: #000;
        font-weight: 700;
    }
  .buttona{
      width:82%;
      justify-self: flex-end;
      color: #fff;
      background: #222A23;
      font-size: 1em;
      font-weight: bold;
      outline: none;
      border: none;
      border-radius: 5px;
      transition: .2s ease-in;
      cursor: pointer;
    }

    .buttona:hover{
        background: #C5DFC7;
    }

</style>
    <div class="main-wrapper first-data backcolor">


            <div id="month-calendar">
                <ul class="month">
                    <li class="prev"><i class="fas fa-angle-double-left"></i></li>
                    <li class="next"><i class="fas fa-angle-double-right"></i></li>
                    <div style="display: flex;justify-content: center;gap:1em">
                        <li class="currentday">16</li>
                        <li class="month-name">Fevrier</li>
                        <li class="year-name">2023</li>
                    </div>


                </ul>
                <ul class="weekdays">
                    <li>Lundi</li>
                    <li>Mardi</li>
                    <li>Mercredi</li>
                    <li>Jeudi</li>
                    <li>Vendredi</li>
                    <li>Samedi</li>
                    <li>Dimanche</li>
                </ul>
                <ul class="days">
                    <li>
                        <ul style="list-style: square;"><li>&#9632; Couscous</li><li>&#9632; Tagine</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>
                    <li>
                        <ul><li>&#9632; Couscous</li><li>&#9632; Lasagne pomme de terre</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>


                    <li>
                        <ul><li>&#9632; Couscous</li><li>&#9632; Gratin de poisson </li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>

                    <li>
                        <ul><li>&#9632; Couscous</li><li>&#9632; Tagine</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>

                    <li>
                        <ul><li>&#9632; Thé a la menthe</li><li>&#9632; Tagine</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>

                    <li>
                        <ul><li>&#9632; Couscous</li><li>&#9632; Tagine</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>

                    <li>
                        <ul><li>&#9632; Couscous</li><li>&#9632; Tagine</li></ul>
                        <button class="buttona" ><i class="fa-duotone fa-plus"></i></button>
                    </li>
                </ul>
            </div>




    </div>

