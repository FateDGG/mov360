<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Ajustes de cuenta</a>
    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Tarjetas</a>
    <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Últimas órdenes</a>
    <a class="nav-link" id="v-pills-help-tab" data-toggle="pill" href="#v-pills-help" role="tab" aria-controls="v-pills-help" aria-selected="false">Alquileres Recientes</a>
</div>


<script>
    // Escucha los clics en las pestañas
    document.querySelectorAll('.nav-link').forEach(item => {
        item.addEventListener('click', event => {
            const tabId = event.target.id;
            // Envia un evento personalizado con el ID de la pestaña seleccionada
            const profileTabSelectedEvent = new CustomEvent('profileTabSelected', { detail: { tabId } });
            document.dispatchEvent(profileTabSelectedEvent);
        });
    });
</script>