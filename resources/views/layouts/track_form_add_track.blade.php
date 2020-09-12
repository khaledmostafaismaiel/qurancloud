<form action="/tracks" enctype="multipart/form-data" method="POST" class="">
    {{csrf_field()}}
    <fieldset class="form-add_track flex-container-column-wrap">
        <table>
                <tr class="form-group">
                    <td class="">&nbsp;</td>
                    <td class=""><input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" /></td>

                </tr>
                <tr class="form-group">
                    <td class=""><input class="form-control-file" type="file" name="file_upload" required/></td>
                    <td class=""><textarea name="caption" id="" cols="100" rows="3" class="form-control" placeholder="Track caption"></textarea></td>
                </tr>
                <tr class="form-group">
                    <td>&nbsp;</td>
                    <td class=""><input type="submit"  class="btn btn-secondary" name="submit" value="ok"></td>
                </tr>
        </table>
    </fieldset>
</form>
