<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Penjualan
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga </th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th>Profit</th>
                                        
                                        
                                    </tr>
                                </thead>


                                 <tbody>
                                 <?php
                                    $no=1;
                                    $sql = $koneksi->query("select * from tb_penjualan2, tb_barang2 where tb_penjualan2.kode_barang=tb_barang2.kode_barang");
                                    while ($tampil=$sql->fetch_assoc()) {

                                    $profit = $tampil['profit'] * $tampil['jumlah'];

                                  ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo date('d F Y', strtotime( $tampil['tanggal_penjualan'])); ?> </td>
                                        <td><?php echo $tampil['kode_barang'] ?> </td>
                                        <td><?php echo $tampil['nama_barang'] ?> </td>
                                        <td><?php echo "Rp." .number_format( $tampil['harga_jual']); ?>,- </td>   
                                        <td><?php echo $tampil['jumlah'] ?> </td>
                                        <td align="right"><?php echo "Rp." .number_format( $tampil['total']); ?>,- </td>
                                        <td align="right"><?php echo "Rp." .number_format( $profit); ?>,- </td>
                                        
                                        
                                    </tr>
                                    <?php
                                        $total_pj = $total_pj+$tampil['total']; 
                                        $total_profit = $total_profit+$profit;
                                        } 
                                    ?>
                                 </tbody>
                                 <tr>
                                    <th style="text-align: center; font-size: 17px;" colspan="6">Total Penjualan dan Profit</th>
                                    <td align="right" style="font-size: 15px;"><b><?php echo "Rp." .number_format($total_pj) ; ?>,-</b></td>
                                    <td align="right" style="font-size: 15px;"><b><?php echo "Rp." .number_format($total_profit) ; ?>,-</b></td>
                                </tr>
                             </table>

                             <a href=""  class= "btn btn-success waves-effect" data-toggle="modal" data-target="#smallModal" target="blank"><i class="material-icons">print </i> Cetak Pdf</a> 

                             <a href="" onclick="self.history.back() " class= "btn btn-success waves-effect"><i class="material-icons">settings_backup_restore </i> Kembali</a> 


                             


<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Laporan Penjualan</h4>
                        </div>


                        <div class="modal-body">

                         <form role="form" method="POST" action="laporan/penjualan/lap_penjualan_pdf.php" target="blank" >

                            <label for="nama">Dari Tanggal</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="date" name="tgl1"  class="form-control" placeholder="Tanggal Awal" required="">
                                  </div>
                              </div>

                              <label for="nama">Sampai Tanggal</label>
                              <div class="form-group">
                                  <div class="form-line">
                                      <input type="date" name="tgl2"  class="form-control" placeholder="Tanggal Akhir" required="">
                                  </div>
                              </div>

                                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="cetak" class= "btn btn-success waves-effect" style="margin-top: px;"><i class="material-icons">print </i> Cetak per Periode</button>
                                            
                            <a href="./laporan/penjualan/lap_penjualan_pdf2.php" class="btn btn-primary waves-effect" target="blank" style="margin-top: px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak Semua</a>

                            
                        </div>
                    </div>
                    </form>
                </div>
            </div>