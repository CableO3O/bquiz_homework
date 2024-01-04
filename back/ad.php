<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center;">
            <tbody>
                <tr class="yel">
                    <td width="80%">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $rows = $DB->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <input type="text" name="text[]" style="width: 90%;" class="form-control" value="<?= $row['text']; ?>">
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" class="form-check-input" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" class="form-check-input" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td width="200px">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            新增動態文字廣告
                        </button>
                    </td>
                    <td class="cent"><input type="submit" value="修改確定" class="btn btn-primary me-3"><input type="reset" value="重置" class="btn btn-primary ms-3"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">新增動態文字廣告</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="./api/add.php">
                    <table>
                        <tr>
                            <td>動態文字廣告:</td>
                            <td><input type="text" name="text" id="" class="form-control"></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <input type="hidden" name="table" value="<?=$_GET['do']?>">
                        <input class="btn btn-primary" type="submit" value="新增">
                        <input class="btn btn-primary" type="reset" value="重置">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>