<div class="container">
    <center>
        <table>
            <tr>
                <td>
                    <div class="table-responsive full-width">
                        <table class-"table table-bordered table-striped table-hover" id="table-datatable">
                            <tr>
                                <th>No Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>ID User</th>
                                <th>ID Buku</th>
                                <th>Tanggal Kembali</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Terlambat</th>
                                <th>Denda</th>
                                <th>Status</th>
                                <th>Total Denda</th>
                                <th>Pilihan</th>
                            </tr>
                            <?php

                            foreach ($pinjam as $p) {
                            ?>
                                <tr>
                                    <td><?= $prnopinjaml; ?></td>
                                    <td><?= $prtglpinjaml; ?></td>
                                    <td><?= $prid_userl; ?></td>
                                    <td><?= $prid_bukul; ?></td>
                                    <td><?= $prtgl_kembalii; ?></td>
                                    <td><?= date('Y-m-d'); ?>
                                        <input type="hidden" name="tgl_pengembalian id=" tgl_pengembalian" value="<?= date('Y-m-d'); ?>">
                                    </td>
                                    <td>
                                        <?php
                                        $tgli = new DateTime($p['tgl_kembali']);
                                        $tg12 = new DateTime();
                                        $selisih = $tg12->diff($tg11)->format("%a");
                                        echo $selisih;
                                        ?> Hari
                                    </td>
                                    <td><?= $prdendal; ?></td>

                                    <?php if ($p['status'] == "Pinjam") {
                                        $status = "warning";
                                    } else {
                                        $status = "secondary";
                                    } ?>
                                    <td><i class="btn btn-outline-<?= $status; ?> btn-sm"><?= $p['status']; ?></i></td>
                                    <?php
                                    if ($selisih < 0) {
                                        $total_denda = $p['denda'] * 0;
                                    } else {
                                        $total_denda = $p['denda'] * $selisih;
                                    }
                                    ?>

                                    <td><?= $total_denda; ?>
                                        <input type="hidden" name="totaldenda" id="totaldenda" value="<?= $total_denda; ?>">
                                    </td>
                                    <td nowrap>
                                        <?php if ($p['status'] == "Kembali") { ?>
                                            <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-edit"></i>Ubah Status</i>
                                        <?php } else { ?>
                                            <a class="btn btn-sm btn-outline-info" href="<?= base_url('pinjam/ubahStatus/' . $p['id_buku'] . '/' . $p['no_pinjam']); ?>"><i class="fas fa-fw fa-edit"></i>Ubah Status</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </table>
                    </div>
                </td>
            </tr>

        </table>
    </center>
</div>