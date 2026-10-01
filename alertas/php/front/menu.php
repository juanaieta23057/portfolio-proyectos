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
    <title>Alertas - Menú Principal</title>
    

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script> 
    <script src="js/jquery-ui.min.js"></script>
    
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
<body>

<?php //include('mem.php'); ?>

<div class="container main-container">
    
    <!-- Encabezado Principal -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Panel de Control de Alertas</h2>
        <p class="text-muted">Sistema de gestión integral de estadísticas, mapas y reportes</p>
    </div>

    <?php if (isset($error_bd)): ?>
        <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($error_bd); ?></div>
    <?php endif; ?>

    <!-- MENÚ DE NAVEGACIÓN POR PESTAÑAS (TABS) -->
    <ul class="nav nav-pills mb-0" id="menuTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="carga-tab" data-bs-toggle="tab" data-bs-target="#carga-pane" type="button" role="tab">📥 Cargar Datos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="listados-tab" data-bs-toggle="tab" data-bs-target="#listados-pane" type="button" role="tab">📋 Listados y Reportes</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="mapas-tab" data-bs-toggle="tab" data-bs-target="#mapas-pane" type="button" role="tab">🗺️ Mapas Geográficos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="calor-tab" data-bs-toggle="tab" data-bs-target="#calor-pane" type="button" role="tab">🔥 Mapas de Calor</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="graficos-tab" data-bs-toggle="tab" data-bs-target="#graficos-pane" type="button" role="tab">📈 Gráficos</button>
        </li>
    </ul>

    <!-- CONTENIDO DE LAS PESTAÑAS -->
    <div class="tab-content" id="menuTabsContent">
        
        <!-- PESTAÑA 1: CARGA DE DATOS -->
        <div class="tab-pane fade show active" id="carga-pane" role="tabpanel">
            <h4 class="text-secondary mb-3">Gestión de Carga</h4>
            <form action="metl.php" method="get" name="frmNuevo" class="row g-3 align-items-end">
                <div class="col-md-8">
                    <label for="txtfechaload" class="form-label">Fecha de entrada de registros</label>
                    <input type="text" name="txtfechaload" id="txtfechaload" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <input name="sbmfecha6" type="submit" class="btn btn-primary w-100" value="Cargar nuevos">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 2: LISTADOS Y REPORTES -->
        <div class="tab-pane fade" id="listados-pane" role="tabpanel">
            <h4 class="text-secondary mb-3">Reportes y Casos</h4>
            <div class="list-group mb-4">
                <form action="metlist.php" method="get" class="mb-3">
                    <button type="submit" name="sbmfecha3" class="btn btn-outline-secondary w-100 text-start py-2">
                        📄 <strong>Ver todos los casos registrados</strong> <span class="float-end text-muted">&rarr;</span>
                    </button>
                </form>
            </div>
            
            <hr>
            <h5 class="text-secondary fs-6 mb-3">Casos Repetidos por Rango de Fechas</h5>
            <form action="metstat.php" method="get" name="frmstat" class="row g-3 align-items-end">
                <div class="col-md-5">
                    <label for="txtfechainirep" class="form-label">Fecha inicial</label>
                    <input type="text" name="txtfechainirep" id="txtfechainirep" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-5">
                    <label for="txtfechafinrep" class="form-label">Fecha final</label>
                    <input type="text" name="txtfechafinrep" id="txtfechafinrep" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-2">
                    <input name="sbmfecha5" type="submit" class="btn btn-info text-white w-100" value="Buscar">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 3: MAPAS GEOGRÁFICOS -->
        <div class="tab-pane fade" id="mapas-pane" role="tabpanel">
            <h4 class="text-secondary mb-3">Visualización en Mapas</h4>
            
            <form action="met.php" method="GET" class="row g-3 align-items-end mb-4 pb-3 border-bottom">
                <div class="col-12"><h6 class="fw-bold text-dark">1. Filtrar mapa por rango de fechas</h6></div>
                <div class="col-md-5">
                    <label for="txtfechaini" class="form-label">Fecha inicial</label>
                    <input type="text" name="txtfechaini" id="txtfechaini" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-5">
                    <label for="txtfechafin" class="form-label">Fecha final</label>
                    <input type="text" name="txtfechafin" id="txtfechafin" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-2">
                    <input name="sbmfecha" type="submit" class="btn btn-success w-100" value="Ver Mapa">
                </div>
            </form>

            <form action="mec.php" method="get" class="row g-3 align-items-end">
                <div class="col-12"><h6 class="fw-bold text-dark">2. Filtrar por Comisiones y Categorías</h6></div>
                <div class="col-md-5">
                    <label for="sltcoms" class="form-label">Comisiones (Múltiple)</label>
                    <select id="sltcoms" name="sltcoms[]" size="5" class="form-select" multiple>
                        <option value="0" selected>Todas</option>
                        <?php for ($i = 1; $i <= 15; $i++): ?>
                            <option value="<?php echo $i; ?>">COM <?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="sltcats" class="form-label">Categorías (Múltiple)</label>
                    <select id="sltcats" name="sltcats[]" size="5" class="form-select" multiple>
                        <option value="0" selected>Todas</option>
                        <?php foreach ($alertascats as $cut): ?>
                            <option value="<?php echo $cut['idcat']; ?>"><?php echo mb_strtolower($cut['cat']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <input name="sbmfecha4" type="submit" class="btn btn-warning text-dark w-100" value="Ver Mapa">
                    <input name="txtcats" type="hidden" value="3">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 4: MAPAS DE CALOR -->
        <div class="tab-pane fade" id="calor-pane" role="tabpanel">
            <h4 class="text-secondary mb-3">Análisis de Densidad (Mapa de Calor)</h4>
            <form action="metheat.php" method="get" name="frmheat" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="txtfechainiheat" class="form-label">Fecha inicial</label>
                    <input type="text" name="txtfechainiheat" id="txtfechainiheat" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="txtfechafinheat" class="form-label">Fecha final</label>
                    <input type="text" name="txtfechafinheat" id="txtfechafinheat" class="form-control" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="sltcatsheat" class="form-label">Categorías</label>
                    <select id="sltcatsheat" name="sltcatsheat[]" size="4" class="form-select" multiple>
                        <option value="0" selected>Todxs</option>
                        <?php foreach ($alertascats as $cut): ?>
                            <option value="<?php echo $cut['idcat']; ?>"><?php echo mb_strtolower($cut['cat']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 text-end mt-4">
                    <input name="sbmfecha4" type="submit" class="btn btn-danger px-5" value="Generar Mapa de Calor">
                    <input name="txtcats" type="hidden" value="3">
                </div>
            </form>
        </div>

        <!-- PESTAÑA 5: GRÁFICOS Y ESTADÍSTICAS -->
        <div class="tab-pane fade" id="graficos-pane" role="tabpanel">
            <h4 class="text-secondary mb-3">Estadísticas y Gráficos del Sistema</h4>
            <p class="text-muted mb-4">Seleccione un reporte gráfico para visualizar los indicadores correspondientes:</p>
            
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Torta de Casos</h6>
                        <p class="small text-muted mb-3">Distribución de casos por categoría.</p>
                        <a href="grsun2.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Barras por Categorías</h6>
                        <p class="small text-muted mb-3">Comparativa general de incidencias.</p>
                        <a href="grbars.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Barras Gas Calefa</h6>
                        <p class="small text-muted mb-3">Seguimiento específico de gas y calefacción.</p>
                        <a href="grbarsGasCalefa.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Dependencia Funcional</h6>
                        <p class="small text-muted mb-3">Escuelas con alertas por dependencia.</p>
                        <a href="grStackColsDepFunc.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Timeline Avanzado</h6>
                        <p class="small text-muted mb-3">Línea de tiempo detallada de eventos.</p>
                        <a href="grAdvTimeline.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Timeline Gas/Calefacción</h6>
                        <p class="small text-muted mb-3">Evolución del período 2024/2025.</p>
                        <a href="grTimelinePHP.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Barras Top</h6>
                        <p class="small text-muted mb-3">Análisis de series temporales y registros top.</p>
                        <a href="grSplineIrrRegTime.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Tree Top 20</h6>
                        <p class="small text-muted mb-3">Mapa de árbol con los principales indicadores.</p>
                        <a href="grTreeGraphTop20Cui.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Top 5 Categorías (24/25)</h6>
                        <p class="small text-muted mb-3">Comparativa interanual de categorías principales.</p>
                        <a href="grbarsCatsTop5.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card chart-card h-100 p-3 shadow-sm">
                        <h6 class="fw-bold text-primary">Top 5 (Enero-Julio)</h6>
                        <p class="small text-muted mb-3">Análisis del primer semestre 2024/2025.</p>
                        <a href="grbarsCatsTop51erSemestre.php" class="btn btn-sm btn-outline-primary mt-auto">Ver Gráfico &rarr;</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>