console.log("hola perro");

// Reemplaza '/api/data' con la URL correcta de tu API
fetch("/api/ajaxlote")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Error al obtener los datos");
        }
        return response.json();
    })
    .then((data) => {
        initMap(data); // Muestra "value1" en la consola
    })
    .catch((error) => {
        console.error("Error:", error);
    });


function getPolygonCenter(polygon) {
    const bounds = new google.maps.LatLngBounds();
    const coordinates = polygon.getPath().getArray();
    coordinates.forEach((coordinate) => {
        bounds.extend(coordinate);
    });
    return bounds.getCenter();
}

function initMap(lote) {
    const mapOptions = {
        zoom: 16,
        center: { lat: -17.847987, lng: -63.174799 },
    };

    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    const terrenoCoordsD = [];
    const terrenoCoordsR = [];
    const terrenoCoordsV = [];

    lote.forEach((elem) => {
        if (elem.estado === "Disponible") {
            terrenoCoordsD.push({
                coordinates: [
                    { lat: elem.coord_A_lat, lng: elem.coord_A_long },
                    { lat: elem.coord_B_lat, lng: elem.coord_B_long },
                    { lat: elem.coord_C_lat, lng: elem.coord_C_long },
                    { lat: elem.coord_D_lat, lng: elem.coord_D_long },
                ],
                labelText: elem.id,
            });
        }
        if (elem.estado === "Reservado") {
            terrenoCoordsR.push({
                coordinates: [
                    { lat: elem.coord_A_lat, lng: elem.coord_A_long },
                    { lat: elem.coord_B_lat, lng: elem.coord_B_long },
                    { lat: elem.coord_C_lat, lng: elem.coord_C_long },
                    { lat: elem.coord_D_lat, lng: elem.coord_D_long },
                ],
                labelText: elem.id,
            });
        }
        if (elem.estado === "Vendido") {
            terrenoCoordsV.push({
                coordinates: [
                    { lat: elem.coord_A_lat, lng: elem.coord_A_long },
                    { lat: elem.coord_B_lat, lng: elem.coord_B_long },
                    { lat: elem.coord_C_lat, lng: elem.coord_C_long },
                    { lat: elem.coord_D_lat, lng: elem.coord_D_long },
                ],
                labelText: elem.id,
            });
        }
    });

    terrenoCoordsD.forEach((terrenoData) => {
        const terrenoCoords = terrenoData.coordinates.map(
            (coord) => new google.maps.LatLng(coord.lat, coord.lng)
        );

        const terrenoD = new google.maps.Polygon({
            paths: terrenoCoords,
            strokeColor: "#30AB26",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#30AB26",
            fillOpacity: 0.35,
        });

        terrenoD.setMap(map);

        google.maps.event.addListener(terrenoD, "click", () => {
            onPolygonClick(terrenoData.labelText);
        });

        const center = getPolygonCenter(terrenoD);
        const labelMarker = new google.maps.Marker({
            position: center,
            map: map,
            icon: {
                url: "data:image/svg+xml;utf-8,",
                size: new google.maps.Size(0, 0),
                anchor: new google.maps.Point(0, 0),
            },
            label: {
                text: terrenoData.labelText + "",
                color: "black",
                fontSize: "14px",
            },
        });
    });

    terrenoCoordsR.forEach((terrenoData) => {
        const terrenoCoords = terrenoData.coordinates.map(
            (coord) => new google.maps.LatLng(coord.lat, coord.lng)
        );

        const terrenoR = new google.maps.Polygon({
            paths: terrenoCoords,
            strokeColor: "#FFC300",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FFC300",
            fillOpacity: 0.35,
        });

        terrenoR.setMap(map);

        const center = getPolygonCenter(terrenoR);
        const labelMarker = new google.maps.Marker({
            position: center,
            map: map,
            icon: {
                url: "data:image/svg+xml;utf-8,",
                size: new google.maps.Size(0, 0),
                anchor: new google.maps.Point(0, 0),
            },
            label: {
                text: terrenoData.labelText + "",
                color: "black",
                fontSize: "14px",
            },
        });
    });

    terrenoCoordsV.forEach((terrenoData) => {
        const terrenoCoords = terrenoData.coordinates.map(
            (coord) => new google.maps.LatLng(coord.lat, coord.lng)
        );

        const terrenoV = new google.maps.Polygon({
            paths: terrenoCoords,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
        });

        terrenoV.setMap(map);

        const center = getPolygonCenter(terrenoV);
        const labelMarker = new google.maps.Marker({
            position: center,
            map: map,
            icon: {
                url: "data:image/svg+xml;utf-8,",
                size: new google.maps.Size(0, 0),
                anchor: new google.maps.Point(0, 0),
            },
            label: {
                text: terrenoData.labelText + "",
                color: "black",
                fontSize: "14px",
            },
        });
    });

    function onPolygonClick(loteId) {
        // Aquí puedes enviar el valor a donde lo necesites, por ejemplo, imprimirlo en la consola:
        console.log("Lote seleccionado:", loteId);
        sendLoteIdToController(loteId);
    }

    async function sendLoteIdToController(loteId) {
        try {
            const response = await fetch("/lote/cargaloted", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({ lote_id: loteId }),
            });

            if (!response.ok) {
                throw new Error("Error al enviar el lote_id");
            }

            const lotes = await response.json();

            const lote = lotes.lote_id;
            console.log("Respuesta del controlador:", lote);
            // cargarDatosTablaLotes(lote);

            cargaDatodFormularioVenta(lote);
        } catch (error) {
            console.error("Error:", error);
        }
    }

    function cargaDatodFormularioVenta(venta) {
        var form_venta = document.getElementById("formulario_venta");
        var lote_id = form_venta.elements["lote_id"];
        var monto = form_venta.elements["monto"];
        var fecha = form_venta.elements["fecha"];
        var fecha_actual = new Date();

        lote_id.value = venta.id;
        monto.value = venta.precio;
        fecha_formato = fecha_actual.toLocaleDateString();

        var partes = fecha_formato.split("/");

        var dia = partes[0];
        var mes = partes[1];
        var anio = partes[2];
        if (mes.length === 1) {
            mes = "0" + mes;
        }
        var fechaFormateada = anio + "-" + mes + "-" + dia;
        fecha.value = fechaFormateada;
        cargarDatosTablaLotes(lote);
    }

    function cargarDatosTablaLotes(lote) {
        const tablaLotes = document.getElementById("tabla-lotes");
        const tbody = tablaLotes.querySelector("tbody");

        tbody.innerHTML = "";

        const tr = document.createElement("tr");

        const tdId = document.createElement("td");
        tdId.textContent = lote.id;
        tr.appendChild(tdId);

        const tdCoorAlat = document.createElement("td");
        tdCoorAlat.textContent = lote.coord_A_lat;
        tr.appendChild(tdCoorAlat);

        const tdCoorAlon = document.createElement("td");
        tdCoorAlon.textContent = lote.coord_A_long;
        tr.appendChild(tdCoorAlon);

        const tdCoorBlat = document.createElement("td");
        tdCoorBlat.textContent = lote.coord_B_lat;
        tr.appendChild(tdCoorBlat);

        const tdCoorBlon = document.createElement("td");
        tdCoorBlon.textContent = lote.coord_B_long;
        tr.appendChild(tdCoorBlon);

        const tdCoorClat = document.createElement("td");
        tdCoorClat.textContent = lote.coord_C_long;
        tr.appendChild(tdCoorClat);

        const tdCoorDlat = document.createElement("td");
        tdCoorDlat.textContent = lote.coord_D_lat;
        tr.appendChild(tdCoorDlat);

        const tdCoorDlong = document.createElement("td");
        tdCoorDlong.textContent = lote.coord_D_long;
        tr.appendChild(tdCoorDlong);

        const tdPrecio = document.createElement("td");
        tdPrecio.textContent = lote.precio;
        tr.appendChild(tdPrecio);

        const tdDimensiones = document.createElement("td");
        tdDimensiones.textContent = lote.dimension;
        tr.appendChild(tdDimensiones);

        const tdEstado = document.createElement("td");
        tdEstado.textContent = lote.estado;
        tr.appendChild(tdEstado);

        tbody.appendChild(tr);
    }
}

google.maps.event.addDomListener(window, "load", initMap);
