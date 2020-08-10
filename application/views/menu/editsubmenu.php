<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('menu/editsub/' . $user_sub_menu['id']); ?>

            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Title</label>
                <input type="hidden" name="id" value="<?= $user_sub_menu['id']; ?>">
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $user_sub_menu['title']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $user_sub_menu['url']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="menu" class="col-sm-2 col-form-label">Icon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $user_sub_menu['icon']; ?>">
                </div>
            </div>


            <div class="form-grouf row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->