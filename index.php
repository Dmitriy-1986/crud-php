<?php
    include 'db.php';
    include 'foo.php';

?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>CRUD</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  </head>
  <body>
        
    <div class="container">
        <h1 class="mt-5 text-center">CRUD</h1>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create">
                    <i class="fa fa-plus"></i>
                </button>
                <table class="table table-striped table-hover">
                    <thead class="th-dark">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $res) { ?>
                            <tr>
                                <td><?php echo $res->id; ?></td>
                                <td><?php echo $res->name; ?></td>
                                <td><?php echo $res->email; ?></td>
                                <td>
                                    <a href="?id=<?php echo $res->id; ?>" data-bs-toggle="modal"  data-bs-target="#edit<?php echo $res->id; ?>" class="btn btn-success" ><i class="fa fa-edit"></i></a>
                                    <a href="?id=<?php echo $res->id; ?>"  data-bs-toggle="modal"  data-bs-target="#delete<?php echo $res->id; ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            <!-- Modal edit-->
                            <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Изменить запись</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="?id=<?php echo $res->id; ?>" method="post">
                                        <div class="form-group">
                                            <small>Имя:</small>
                                            <input type="text" class="form-control" name="name" value="<?php echo $res->name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <small>Email:</small>
                                            <input type="text" class="form-control" name="email" value="<?php echo $res->email; ?>">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" name="edit" class="btn btn-primary">Сохранить</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- //Modal edit-->

                            <!-- Modal delete-->
                            <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Удалить запись № <?php echo $res->id; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>                                    
                                <div class="modal-footer">
                                    <form action="?id=<?php echo $res->id; ?>" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" name="delete" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- //Modal delete-->

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal create-->
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <small>Имя:</small>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <small>Email:</small>
                    <input type="text" class="form-control" name="email">
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="submit" name="add" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- //Modal create-->

    







    <!-- Дополнительный JavaScript; выберите один из двух! -->

    <!-- Вариант 1: Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Вариант 2: Bootstrap JS отдельно от Popper
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<!-- 
    https://www.youtube.com/watch?v=UOJA7-C5kjQ
    21:52 
-->