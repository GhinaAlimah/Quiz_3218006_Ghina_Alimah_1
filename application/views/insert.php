<h2><?php echo $judul; ?></h2>
<?php echo validation_error(); ?>
<?php echo form_open('insert'); ?>
 <table>
 <tr>
 <td><label for="title">NIM</label></td>
 <td><input type="input" name="nim"></td>
 </tr>
 <tr>
 <td><label for="text">NAMA</label></td>
 <td><input type="input" name="nama"></td>
 </tr>
 <tr>
 <td><label for="text">JUDUL SKRIPSI</label></td>
 <td><input type="input" name="judul"></td>
 </tr>
 <tr>
 <td><label for="text">NAMA PEMBIMBING</label></td>
 <td><input type="input" name="pemb"></td>
 </tr>
 
 <tr>
 <td></td>
 <td><input type="submit" name="submit" value="SAVE" /></td>
 </tr>
 </table>
</form>
