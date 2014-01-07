<?php
class Helper {

  public function set_flash( $msg ) {
    unset($_SESSION['error']);
    $_SESSION['flash'] = $msg;
  }

  public function msg_flash() {
    if(!empty($_SESSION['flash'])) {
      $f = $_SESSION['flash'];
      unset($_SESSION['flash']);
      return $f;
    }
    return false;
  }

  public function msg_error() {
    if(!empty($_SESSION['error'])) {
      $e = $_SESSION['error'];
      unset($_SESSION['error']);
      return $e;
    }
    return false;
  }

  public function keypad( $buttons ) {
    $btn_siz = isset($buttons['conf']) ? 'btn-'.$buttons['conf']['size'] : 'btn-default';
    $id = isset($buttons['conf']['id']) ? $buttons['conf']['id'] : null;
    $type = isset($buttons['conf']['type']) ? $buttons['conf']['type'] : null;
    $out = "<div class='btn-group no-wrap' style=''>";
    foreach( $buttons as $action => $action_lbl) {
      if( $action==='submit' ) {
        $out .= "<button type='submit' class='btn btn-primary $btn_siz'>$action_lbl</button>";
      } elseif( $action==='back' ){
        #$out .= "<a class='btn btn-default' href='javascript: window.history.back();' >$action_lbl</a>";
        $out .= "<button type='button' class='btn btn-default $btn_siz' onclick='javascript: window.history.back();'>$action_lbl</button>";
      } elseif( $action==='list' ) {
        $out .= "<button type='button' class='btn btn-default $btn_siz' onclick='javascript: window.location.href=\"{$action_lbl[1]}\"'>{$action_lbl[0]}</button>";
      } elseif( $action==='button' or $action==='add' ) {
        $out .= "<a href='{$action_lbl[1]}' class='btn btn-{$action_lbl[2]} $btn_siz'>{$action_lbl[0]}</a>";
      } elseif( $action==='delete' ) {
        $out .= "<button type='submit' class='btn btn-danger $btn_siz' >$action_lbl</button>";
      } elseif( $action==='tbl-show' ) {
        $out .= "<a href='/$type/$id' class='btn btn-default $btn_siz'>$action_lbl</a>";
      } elseif( $action==='tbl-edit' ) {
        $out .= "<a href='/$type/$id/edit' class='btn btn-default $btn_siz'>$action_lbl</a>";
       } elseif( $action==='tbl-nested-edit' ) {
        $out .= "<a href='$action_lbl[1]/$type/$id/edit' class='btn btn-default $btn_siz'>$action_lbl[0]</a>";
      } elseif( $action==='tbl-delete' ) {
        $out .= "<form action='/$type/$id' method='POST' class='btn btn-danger $btn_siz' onSubmit=\"return confirm('¿Está seguro de eliminar?')\" style='white-space:nowrap!important;float:left;'>";
        $out .= "<input type='hidden' name='_METHOD' value='DELETE'/>";
        $out .= "<input type='hidden' name='id' value='$id'/><button type='submit' class='fg-white btn-clean' >$action_lbl</button></form>";
      }
    }
    $out .= "</div>";
    return $out;
  }

  public function form_fields( $params ) {
    $model = $params['model'];
    $out = "";
    $lbl_col = isset($params['label-col']) ? $params['label-col'] : 2;
    $lbl_off = isset($params['label-off']) ? $params['label-off'] : 12 - $lbl_col;
    foreach($params['fields'] as $field ) {
      $lbl = $field[0];
      $id = $model . '-' . $field[1];
      $name = $model . '['. $field[1] . ']';
      $type = $field[2];
      $value = htmlspecialchars( $field[3] );
      $out .= "<div class='form-group'>";
      $out .= "<label class='col-sm-$lbl_col control-label' for='$id'>$lbl</label>\n";
      $out .= "<div class='col-sm-$lbl_off'>";
      switch($type) {
      case 'textarea':
        $out .= "<textarea class='form-control' id='$id' name='$name'>$value</textarea>";
        break;
      case 'keygenerator':
        $out .= "<div class='input-group'>";
        $out .= "<input type='text' class='form-control' id='$id' name='$name' value='$value' />\n";
        $out .= "<div class='input-group-btn'>";
        $out .= "<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' onclick='generar_clave(\"$id\");'>Generar Clave</button>";
        $out .= "</div></div>";
        break;
      case 'color-picker':
        $out .= "<div id='color-selector' style=''>";
        $out .= "<input type='text' class='form-control color-picker' id='$id' name='$name' value='$value' /><div style='background-color:$value;width:64px;height:64px;'></div></div>";
        $out .= <<<SCRIPT
<script>
$(function() {
  console.log("COLOR");
  $('#color-selector').ColorPicker({
    color: '$value',
    onShow: function (colpkr) {
      $(colpkr).fadeIn(500);
      return false;
    },
    onHide: function (colpkr) {
      $(colpkr).fadeOut(500);
      return false;
    },
    onChange: function (hsb, hex, rgb) {
      $('#color-selector div').css('backgroundColor', '#' + hex);
      $('#color-selector input').val('#' + hex);
    }
    })});
</script>
SCRIPT;
        break;
      default:
        $out .= "<input type='$type' class='form-control' id='$id' name='$name' value='$value' />\n";
      }
      $out .= "</div>";
      $out .= "</div>\n";
    }
    if( isset($params['actions']) ) {
      $out .= "<div class='form-group'>";
      $out .= "<div class='col-sm-offset-$lbl_col col-sm-$lbl_off text-right'>";
      $out .= self::keypad( $params['actions'] );
      $out .= "</div></div>";
    }
    return $out;
  }

  public function table( $params) {
    $out = "<table class='table table-striped table-hover {$params['class']}'><thead><tr>";
    foreach( $params['fields'] as $fld => $lbl ) {
      $out.= "<th>$lbl</th>";
    }
    if( isset($params['actions']) ) $out .= "<th></th>";
    $out .= "</tr></thead><tbody>";
    foreach( $params['record-set'] as $record ) {
      $out .= "<tr>";
      foreach( $params['fields'] as $fld => $lbl ) {
        if(method_exists($record->box(), $fld)){
          $val = $record->$fld();
        } else {
          $val = $record->$fld;
          #$val .= "<pre>" . print_r($record, true) . "</pre>";
        }
        $out .= "<td class='fld-$fld'>$val</td>";
        #$out .= "<td>$val<pre>". print_r($record->box(),true). "</pre></td>";
      }
      if( isset($params['actions']) ) {
        $params['actions']['conf']['id'] = $record->id;
        $params['actions']['conf']['type'] = $record->getMeta('type');
        $out .= "<td style='white-space:nowrap!important;'>";
        $out .= self::keypad($params['actions']);
        $out .= "</td>";
      }
      $out .= "</tr>";
    }
    $out .= "</tbody></table>";
    return $out;
  }
}
