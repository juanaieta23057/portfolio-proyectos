<?php
// front/menu.php
session_start();
require_once '../backend/menu_data.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Alertas</title>
    
    <!-- Bootstrap CSS & JS Bundle -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery y jQuery UI -->
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script src="js/jquery-3.3.1.min.js"></script> 
    <script src="js/jquery-ui.min.js"></script>
    
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    
    <script type="text/javascript">
    $(function() {
        const datepickerConfig = {
            changeMonth: true,
            changeYear: true,
            showOn: "button",
            buttonImage: "../images/calendar_24.png",
            buttonImageOnly: true,
            buttonText: "Elegir fecha",
            dateFormat: 'yy-mm-dd',
            defaultDate: '-0d'
        };

        $("#txtfechaload, #txtfechaini, #txtfechafin, #txtfechainirep, #txtfechafinrep, #txtfechainiheat, #txtfechafinheat").datepicker(datepickerConfig);
    });
    </script>
</head>
<body class="bg-light">

<?php //include('mem.php'); ?>

<div class="container main-container py-4">
    
    <!-- Encabezado Principal Moderno -->
    <div class="d-flex align-items-center justify-content-between mb-4 pb-2 border-bottom">
        <div>
            <h1 class="h4 fw-semibold text-dark mb-1">Panel de Control</h1>
            <p class="text-muted small mb-0">Gestión de alertas, tormentas y estadísticas operativas</p>
        </div>
    </div>

    <?php if (isset($error_bd)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($error_bd); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- MENÚ DE PESTAÑAS (Modo Moderno / Minimalista) -->
    <ul class="nav nav-pills mb-3" id="menuTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="carga-tab" data-bs-toggle="tab" data-bs-target="#carga-pane" type="button" role="tab">Carga de Datos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="listados-tab" data-bs-toggle="tab" data-bs-target="#listados-pane" type="button" role="tab">Listados y Reportes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="mapas-tab" data-bs-toggle="tab" data-bs-target="#mapas-pane" type="button" role="tab">Mapas Geográficos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="calor-tab" data-bs-toggle="tab" data-bs-target="#calor-pane" type="button" role="tab">Mapas de Calor</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="graficos-tab" data-bs-toggle="tab" data-bs-target="#graficos-pane" type="button" role="tab">Gráficos Estadísticos</button>
        </li>
    </ul>

    <!-- CONTENEDOR PRINCIPAL DE LAS PESTAÑAS -->
    <div class="tab-content" id="menuTabsContent">
        
        <!-- PESTAÑA 1: CARGA DE DATOS -->
        <div class="tab-pane fade show active" id="carga-pane" role="tabpanel">
            <h5 class="text-secondary fw-medium fs-6 mb-3">Registrar Nuevos Ingresos</h5>
            <form action="metl.php" method="get" name="frmNuevo" class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label for="txtfechaload" class="form-label text-muted small">Fecha de entrada de registros</label>
                    <input type="text" name="txtfechaload" id="txtfechaload" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <input name="sbmfecha6" type="submit" class="btn btn-dark w-100" value="Cargar registros">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 2: LISTADOS Y REPORTES -->
        <div class="tab-pane fade" id="listados-pane" role="tabpanel">
            <h5 class="text-secondary fw-medium fs-6 mb-3">Consulta de Casos</h5>
            <div class="mb-4">
                <form action="list.php" method="get">
                    <button type="submit" name="sbmfecha3" class="btn btn-outline-dark text-start py-2 px-3 w-100 d-flex justify-content-between align-items-center">
                        <span>Ver listado general de todos los casos</span>
                        <span class="text-muted">&rarr;</span>
                    </button>
                </form>
            </div>
            
            <hr class="text-muted opacity-25">
            <h6 class="text-secondary fw-medium fs-6 mb-3">Casos Repetidos por Rango de Fechas</h6>
            <form action="metstat.php" method="get" name="frmstat" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="txtfechainirep" class="form-label text-muted small">Fecha inicial</label>
                    <input type="text" name="txtfechainirep" id="txtfechainirep" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="txtfechafinrep" class="form-label text-muted small">Fecha final</label>
                    <input type="text" name="txtfechafinrep" id="txtfechafinrep" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <input name="sbmfecha5" type="submit" class="btn btn-dark w-100" value="Buscar casos">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 3: MAPAS GEOGRÁFICOS -->
        <div class="tab-pane fade" id="mapas-pane" role="tabpanel">
            <h5 class="text-secondary fw-medium fs-6 mb-3">Visualización Espacial</h5>
            
            <form action="met.php" method="GET" class="row g-3 align-items-end mb-4 pb-3 border-bottom border-light">
                <div class="col-12"><span class="text-uppercase small fw-bold text-muted">Filtro por período</span></div>
                <div class="col-md-4">
                    <label for="txtfechaini" class="form-label text-muted small">Fecha inicial</label>
                    <input type="text" name="txtfechaini" id="txtfechaini" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="txtfechafin" class="form-label text-muted small">Fecha final</label>
                    <input type="text" name="txtfechafin" id="txtfechafin" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-3">
                    <input name="sbmfecha" type="submit" class="btn btn-dark w-100" value="Generar mapa">
                </div>
            </form>

            <form action="mec.php" method="get" class="row g-3 align-items-end">
                <div class="col-12"><span class="text-uppercase small fw-bold text-muted">Filtro por comisiones y categorías</span></div>
                <div class="col-md-4">
                    <label for="sltcoms" class="form-label text-muted small">Comisiones</label>
                    <select id="sltcoms" name="sltcoms[]" size="4" class="form-select" multiple>
                        <option value="0" selected>Todas</option>
                        <?php for ($i = 1; $i <= 15; $i++): ?>
                            <option value="<?php echo $i; ?>">COM <?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="sltcats" class="form-label text-muted small">Categorías</label>
                    <select id="sltcats" name="sltcats[]" size="4" class="form-select" multiple>
                        <option value="0" selected>Todas</option>
                        <?php foreach ($alertascats as $cut): ?>
                            <option value="<?php echo $cut['idcat']; ?>"><?php echo mb_strtolower($cut['cat']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <input name="sbmfecha4" type="submit" class="btn btn-dark w-100" value="Filtrar mapa">
                    <input name="txtcats" type="hidden" value="3">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 4: MAPAS DE CALOR -->
        <div class="tab-pane fade" id="calor-pane" role="tabpanel">
            <h5 class="text-secondary fw-medium fs-6 mb-3">Análisis de Densidad y Calor</h5>
            <form action="metheat.php" method="get" name="frmheat" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="txtfechainiheat" class="form-label text-muted small">Fecha inicial</label>
                    <input type="text" name="txtfechainiheat" id="txtfechainiheat" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="txtfechafinheat" class="form-label text-muted small">Fecha final</label>
                    <input type="text" name="txtfechafinheat" id="txtfechafinheat" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="sltcatsheat" class="form-label text-muted small">Categorías</label>
                    <select id="sltcatsheat" name="sltcatsheat[]" size="3" class="form-select" multiple>
                        <option value="0" selected>Todas</option>
                        <?php foreach ($alertascats as $cut): ?>
                            <option value="<?php echo $cut['idcat']; ?>"><?php echo mb_strtolower($cut['cat']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 text-end mt-4">
                    <input name="sbmfecha4" type="submit" class="btn btn-dark px-4" value="Generar mapa de calor">
                    <input name="txtcats" type="hidden" value="3">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 5: GRÁFICOS Y ESTADÍSTICAS -->
        <div class="tab-pane fade" id="graficos-pane" role="tabpanel">
            <h5 class="text-secondary fw-medium fs-6 mb-3">Indicadores y Gráficos del Sistema</h5>
            <p class="text-muted small mb-4">Seleccione un reporte para desplegar su representación visual:</p>
            
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Torta de Casos</h6>
                        <p class="text-muted small mb-3">Distribución de casos por categoría.</p>
                        <a href="grsun2.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Barras por Categorías</h6>
                        <p class="text-muted small mb-3">Comparativa general de incidencias.</p>
                        <a href="grbars.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Barras Gas Calefa</h6>
                        <p class="text-muted small mb-3">Seguimiento específico de gas y calefacción.</p>
                        <a href="grbarsGasCalefa.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Dependencia Funcional</h6>
                        <p class="text-muted small mb-3">Escuelas con alertas por dependencia.</p>
                        <a href="grStackColsDepFunc.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Timeline Avanzado</h6>
                        <p class="text-muted small mb-3">Línea de tiempo detallada de eventos.</p>
                        <a href="grAdvTimeline.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Timeline Gas/Calefacción</h6>
                        <p class="text-muted small mb-3">Evolución del período 2024/2025.</p>
                        <a href="grTimelinePHP.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Barras Top</h6>
                        <p class="text-muted small mb-3">Análisis de series temporales y registros top.</p>
                        <a href="grSplineIrrRegTime.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Tree Top 20</h6>
                        <p class="text-muted small mb-3">Mapa de árbol con los principales indicadores.</p>
                        <a href="grTreeGraphTop20Cui.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Top 5 Categorías (24/25)</h6>
                        <p class="text-muted small mb-3">Comparativa interanual de categorías principales.</p>
                        <a href="grbarsCatsTop5.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3">
                        <h6 class="fw-semibold text-dark fs-6">Top 5 (Enero-Julio)</h6>
                        <p class="text-muted small mb-3">Análisis del primer semestre 2024/2025.</p>
                        <a href="grbarsCatsTop51erSemestre.php" class="btn btn-sm btn-outline-secondary mt-auto">Ver reporte &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>