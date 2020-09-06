<form action="/tracks" enctype="multipart/form-data" method="POST" class="">
    {{csrf_field()}}
    <fieldset class="form-add_track flex-container-column-wrap">
        <table>
                <tr class="">
                    <td class="">&nbsp;</td>
                    <td class=""><input type="hidden" name="MAX_FILE_SIZE" value="<?php /*echo $max_file_size; */?>" /></td>

                </tr>
                <tr class="">
                    <td class=""><input class="form-add_track-file_upload" type="file" name="file_upload" required/></td>
                    <td class=""><textarea name="caption" id="" cols="100" rows="3" class="form-add_track-file_caption track-comment-text_area" placeholder="Track caption"></textarea></td>
                </tr>
                <tr class="">
                    <td>&nbsp;</td>
                    <td class=""><input type="submit"  class="btn btn-comment-form" name="submit" value="ok"></td>
                </tr>
        </table>
    </fieldset>
</form>
