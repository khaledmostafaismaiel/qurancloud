<form action="/tracks" enctype="multipart/form-data" method="POST" class="w-100 form-add_track ">
    {{csrf_field()}}
    <fieldset class="flex-container-column-wrap ">
        <table>
                <tr class="form-group">
                    <td class="">&nbsp;</td>
                    <td class=""><input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" /></td>

                </tr>
                <tr class="form-group">
                    <td class=""><input class="form-control-file mr-2" type="file" name="file_upload" required/></td>
                    <td class=""><textarea name="caption" id="" cols="500"  class="form-control ml-2" placeholder="Track caption"></textarea></td>
                </tr>
                <tr class="form-group">
                    <td>&nbsp;</td>
                    <td class=""><input type="submit"  class="btn btn-primary ml-2" name="submit" value="Post"></td>
                </tr>
        </table>
    </fieldset>
</form>
