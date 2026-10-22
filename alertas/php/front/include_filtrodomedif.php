<?php 
require_once('../connections/connection.php');
?>
<input type="hidden" data-type="school_id" name="school_id[]" id="school_id_1" class="form-control autocomplete_txt" autocomplete="off" placeholder="Buscar por direccion"  style="width:400px;">
<input type="text" data-type="school_address" name="school_address[]" id="school_address_1" class="form-control autocomplete_txt" autocomplete="off" placeholder="Buscar por dirección" style="width:400px;">
<input type="hidden" data-type="school_code" name="school_code[]" id="school_code_1" class="form-control autocomplete_txt" autocomplete="off" placeholder="Buscar x CUI" size="16">
<input type="hidden" data-type="school_ut" name="school_ut[]" id="school_ut_1" class="form-control autocomplete_txt" autocomplete="off">

<script type="text/javascript">
<?php include("js/arrayJSescuelasDomedifDomest.php"); ?>
</script>
<script src="js/autocompleteJSescuelasDomedifList.js"></script>