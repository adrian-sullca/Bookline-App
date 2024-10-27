<div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex" style="margin-left: 87px">
                <h5>ORDER <span class="text-primary font-weight-bold">#Y34XDHR</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right" style="margin-left: 87px">
                <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                <p>USPS <span class="font-weight-bold">234094567242423422898</span></p>
            </div>
        </div>

        <!-- Timeline -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <ul id="progressbar" class="text-center">
                    <li class="step0 active">
                        <div class="icon-content">
                            <div class="icon"><i class="bi bi-file-earmark-check"></i></div>
                            <p>Order validated</p>
                        </div>
                    </li>
                    <li class="step0 active">
                        <div class="icon-content">
                            <div class="icon"><i class="bi bi-truck"></i></div>
                            <p>In transit</p>
                        </div>
                    </li>
                    <li class="step0">
                        <div class="icon-content">
                            <div class="icon"><i class="bi bi-house"></i></div>
                            <p>Order delivered</p>
                        </div>
                    </li>
                    <li class="step0">
                        <div class="icon-content">
                            <div class="icon"><i class="bi bi-check-circle"></i></div>
                            <p>Order confirmed</p>
                        </div>
                    </li>
                </ul>
            </div>
            <p> </p>
            <p> </p>
            <button class="custom-button">Start delivery (Mark as in transit)</button>
            <button class="custom-button">Order delivered</button>
        </div>
    </div>
</div>


<style>
    .card {
        /* Establece un ancho máximo para la tarjeta */
        margin: 0 auto;
        /* Centra la tarjeta horizontalmente */
        padding-top: 20px;
        padding-bottom: 20px;
        /* Añade un espaciado interno */
    }

    .row.d-flex.justify-content-center {
        margin-top: 20px;
        /* Aumenta el espaciado entre el contenido superior y la línea de progreso */
    }

    .custom-button {
        width: 100%;
        /* Hace que los botones ocupen todo el ancho de la tarjeta */
        margin: 10px 0;
        /* Aumenta el margen vertical entre los botones */
    }

    /* El resto del CSS sigue igual... */

    .custom-button {
        background-color: #ff8c00;
        /* Color de fondo naranja */
        color: white;
        /* Color del texto */
        border: none;
        /* Sin borde */
        border-radius: 5px;
        /* Bordes redondeados */
        padding: 10px 20px;
        /* Espaciado interno */
        font-size: 1rem;
        /* Tamaño de fuente */
        cursor: pointer;
        /* Cambiar el cursor a puntero */
        transition: background-color 0.3s ease;
        /* Transición suave para el hover */
        margin: 5px;
        /* Espaciado entre botones */
        width: 82%;
    }

    .custom-button:hover {
        background-color: #e07b00;
        /* Color de fondo al pasar el mouse */
    }

    /* Timeline and progress bar styling */
    #progressbar {
        position: relative;
        list-style-type: none;
        padding: 0;
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
    }

    /* Background line */
    #progressbar::before {
        content: '';
        position: absolute;
        top: 25px;
        /* Aligns with icons */
        left: 13%;
        /* Starts the line just after the first icon */
        right: 13%;
        /* Ends the line just before the last icon */
        height: 4px;
        background-color: #dcdcdc;
        /* Default background color */
        z-index: 1;
    }

    /* Progress line for active steps */
    #progressbar li.active~li:before {
        background-color: #dcdcdc;
        /* Background color for inactive steps */
    }

    /* Step items */
    #progressbar li {
        position: relative;
        flex: 1;
        text-align: center;
        z-index: 2;
        /* Ensures icons are above the line */
    }

    /* Completed steps */
    #progressbar li.active .icon {
        background-color: #ff8c00;
        /* Orange for completed steps */
    }

    /* Active line between completed steps */
    #progressbar li.active:before {
        content: '';
        position: absolute;
        top: 25px;
        /* Aligns with icons */
        left: 80%;
        /* Starts the line just after the first icon */
        width: 150px;
        /* Full width until the next step */
        height: 4px;
        background-color: #ff8c00;
        /* Orange for completed steps */
        z-index: -1;
        /* Behind the icons */
        transform: translateX(-50%);
        /* Center the line */
    }

    /* Step icon content */
    .icon-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
    }

    /* Circle icons */
    .icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #dcdcdc;
        /* Default gray background */
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #fff;
        margin-bottom: 10px;
        z-index: 3;
    }

    /* Completed icons */
    #progressbar li.active .icon {
        background-color: #ff8c00;
        /* Orange for completed steps */
    }

    .icon-content p {
        margin: 0;
        font-weight: bold;
        font-size: 0.8rem;
    }
</style>

<!-- Add the required scripts for icons and Bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">