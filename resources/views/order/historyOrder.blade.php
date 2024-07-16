<div class="row">
    <div class="col-md-12">
        <?php
        $q_status = protect($_GET['status']);
        $q_row = protect($_GET['row']);
        $q_start_date = protect($_GET['start_date']);
        $q_end_date = protect($_GET['end_date']);
        $q_search = protect($_GET['search']);
        ?>
        <div class="btn-group flex-wrap mb-3">
            <a href="<?= base_url('order/history'); ?>" class="btn btn-primary <?= (empty($q_status) or $q_status == '') ? 'active' : ''; ?>">Semua</a>
            <a href="<?= base_url('order/history?status=pending'); ?>" class="btn btn-primary <?= ($q_status == 'pending') ? 'active' : ''; ?>">Pending</a>
            <a href="<?= base_url('order/history?status=processing'); ?>" class="btn btn-primary <?= ($q_status == 'processing') ? 'active' : ''; ?>">Processing</a>
            <a href="<?= base_url('order/history?status=success'); ?>" class="btn btn-primary <?= ($q_status == 'success') ? 'active' : ''; ?>">Success</a>
            <a href="<?= base_url('order/history?status=error'); ?>" class="btn btn-primary <?= ($q_status == 'error') ? 'active' : ''; ?>">Error</a>
            <a href="<?= base_url('order/history?status=partial'); ?>" class="btn btn-primary <?= ($q_status == 'partial') ? 'active' : ''; ?>">Partial</a>
        </div>
        <div class="card">
            <h5 class="card-header"><i class="mdi mdi-history me-1"></i>Riwayat Pesanan</h5>
            <div class="card-body">
                 <div class="alert alert-warning">
                    <span class="font-size-16 fw-bold mb-0">Informasi Untuk Layanan Refill</span>
                    <ul class="mb-0">
                        <li>Tombol Refill hanya dapat digunakan untuk layanan yang memiliki label ♻️ pada nama layanannya.</li>
                        <li>Gunakan tombol Refill ini hanya ketika pesanan Anda mengalami drop.</li>
                        <li>Proses Refill mungkin membutuhkan waktu -+24 jam.</li>
                        <li>Anda dapat menggunakan tombol Refill kembali setelah 24 jam dari terakhir kali Anda menggunakannya.</li>
                        <li>Jika saat klik tombol refill, responnya adalah "Refill not allowed" artinya tombol refill belum bisa digunakan dan Anda bisa coba klik tombol refill kembali secara berkala.</li>
                        <li>Anda harus menunggu maksimal selama 3 hari setelah pesanan Anda Success / Selesai untuk dapat menggunakan tombol Refill.</li>
                    </ul>
                </div>
                <form method="get" class="row">
                    <?php
                    if (isset($q_status) and !empty($q_status)) { ?>
                        <input type="hidden" name="status" id="q_status" value="<?= $q_status; ?>">
                    <?php
                    } ?>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tampilkan</span>
                            </div>
                            <select class="form-control" name="row" id="table-row">
                                <option value="10" <?= ($q_row == '10') ? 'selected' : ''; ?>>10</option>
                                <option value="25" <?= ($q_row == '25') ? 'selected' : ''; ?>>25</option>
                                <option value="50" <?= ($q_row == '50') ? 'selected' : ''; ?>>50</option>
                                <option value="100" <?= ($q_row == '100') ? 'selected' : ''; ?>>100</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text">baris.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date" id="table-start-date" value="<?= $q_start_date; ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text">sampai</span>
                            </div>
                            <input type="date" class="form-control" name="end_date" id="table-end-date" value="<?= $q_end_date; ?>">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-filter"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" id="table-search" value="<?= $q_search; ?>" placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-fw fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Layanan</th>
                                <th>Target</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Jumlah Awal</th>
                                <th>Jumlah Kurang</th>
                                <th>Status</th>
                                <th>Refill</th>
                                <th>Tgl. Pesanan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($q_row) && in_array($q_row, array('10', '25', '50', '100'))) {
                                $records_per_page = $q_row;
                            } else {
                                $records_per_page = 10;
                            }
                            $query_list = "SELECT * FROM orders WHERE user_id = '" . $login['id'] . "'";
                            if (!empty($q_status) && in_array($q_status, array('pending', 'processing', 'success', 'error', 'partial'))) {
                                $query_list .= " AND status = '" . ucfirst($q_status) . "'";
                            }
                            if (!empty($q_start_date) and !empty($q_end_date)) {
                                $query_list .= " AND DATE(created_at) BETWEEN '" . $q_start_date . "' AND '" . $q_end_date . "'";
                            } elseif (!empty($q_start_date) and empty($q_end_date)) {
                                $query_list .= " AND DATE(created_at) BETWEEN '" . $q_start_date . "' AND '" . $q_start_date . "'";
                            } elseif (empty($q_start_date) and !empty($q_end_date)) {
                                $query_list .= " AND DATE(created_at) BETWEEN '" . $q_end_date . "' AND '" . $q_end_date . "'";
                            }
                            if (!empty($q_search)) {
                                $query_list .= " AND (service_name LIKE '%" . urlencode($q_search) . "%' OR target LIKE '%" . urlencode($q_search) . "%' OR price LIKE '%$q_search%' OR quantity LIKE '%$q_search%')";
                            }
                            $query_list .= " ORDER BY id DESC";
                            $starting_position = 0;
                            if (isset($_GET['page'])) {
                                $starting_position = (protect($_GET['page']) - 1) * $records_per_page;
                            }
                            $new_query = $query_list . " LIMIT $starting_position, $records_per_page";
                            $new_query = mysqli_query($db, $new_query);
                            $count_row = mysqli_num_rows($new_query);
                            if ($count_row == 0) {
                                echo '<tr><td colspan="10" align="center">Data belum tersedia.</td></tr>';
                            } else {
                                $token = hash_hmac('md5', csrf_token(), $config['secret_key']['hmac']);
                                while ($order = mysqli_fetch_assoc($new_query)) {
                                    if ($order['status'] == 'Pending') {
                                        $color = 'warning';
                                    } elseif ($order['status'] == 'Processing') {
                                        $color = 'primary';
                                    } elseif ($order['status'] == 'Success') {
                                        $color = 'success';
                                    } elseif ($order['status'] == 'Error' || $order['status'] == 'Partial') {
                                        $color = 'danger';
                                    }
                                    $cvDate = convert_timezone($order['created_at'], to: $login['timezone']);
                                    $start_date = new DateTime(substr($cvDate, 0, 10));
                                    $since_start = $start_date->diff(new DateTime(date('Y-m-d')));
                                    $day = match (true) {
                                        $since_start->days == '0' => 'Hari Ini',
                                        $since_start->days == '1' => 'Kemarin',
                                        default => format_date(substr($cvDate, 0, 10), true)
                                    };
                                    $time = substr($cvDate, 11, -3);
                            ?>
                                    <tr>
                                        <td class="text-nowrap"><a href="javascript:;" onclick="detail_order('<?= $order['id']; ?>');" class="btn btn-primary btn-sm btn-rounded shadow"><i class="mdi mdi-eye me-1"></i><?= $order['id']; ?></a></td>
                                        <td><?= urldecode($order['service_name']); ?></td>
                                        <td><?= urldecode($order['target']); ?></td>
                                        <td>Rp <?= number_format($order['price'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($order['quantity'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($order['start_count'], 0, ',', '.'); ?></td>
                                        <td><?= number_format($order['remains'], 0, ',', '.'); ?></td>
                                        <td class="text-nowrap">
                                            <span class="btn btn-soft-<?= $color; ?> btn-sm btn-rounded font-size-13"><?= $order['status']; ?></span>
                                        </td>
                                        <td class="text-nowrap">
                                            <?php
                                            if ($order['is_refill'] == '1' && $order['status'] == 'Success') {
                                                if (!empty($order['refilled_at'])) {
                                                    $start_date = new DateTime(date('Y-m-d H:i:s', strtotime($order['refilled_at'])));
                                                    $since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
                                                    if ($since_start->days >= 1) { ?>
                                                        <a href="<?= base_url('refill/' . $order['id'] . '/' . $token); ?>" class="btn btn-outline-primary btn-sm btn-rounded font-size-13"><i class="mdi mdi-cog-clockwise me-1"></i>Refill</a>
                                                    <?php
                                                    } else { ?>
                                                        <a href="javascript:;" class="btn btn-outline-danger btn-sm btn-rounded font-size-13 disabled"><i class="mdi mdi-cancel"></i> Refill</a>
                                                    <?php
                                                    } ?>
                                                    <?php
                                                } else {
                                                    $start_date = new DateTime(date('Y-m-d H:i:s', strtotime($order['updated_at'])));
                                                    $since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s')));
                                                    if ($since_start->days >= 1) { ?>
                                                        <a href="<?= base_url('refill/' . $order['id'] . '/' . $token); ?>" class="btn btn-outline-primary btn-sm btn-rounded font-size-13"><i class="mdi mdi-cog-clockwise me-1"></i>Refill</a>
                                                    <?php
                                                    } else { ?>
                                                        <a href="javascript:;" class="btn btn-outline-danger btn-sm btn-rounded font-size-13 disabled"><i class="mdi mdi-cancel"></i> Refill</a>
                                                    <?php
                                                    } ?>
                                                <?php
                                                } ?>
                                            <?php
                                            } else { ?>
                                                <a href="javascript:;" class="btn btn-outline-danger btn-sm btn-rounded font-size-13 disabled"><i class="mdi mdi-cancel"></i> Refill</a>
                                            <?php
                                            } ?>
                                        </td>
                                        <td><?= $day . ' - ' . $time; ?></td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if ($count_row > 0) { ?>
                    <ul class="pagination pagination-md mb-1">
                    
                         
                    </ul>
                    <small class="text-muted">Menampilkan 1 sampai 10 dari 30 data.</small>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detail_modal_title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detail_modal_body">
            </div>
        </div>
    </div>
</div>