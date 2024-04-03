package com.rangga.aplikasita

class BarangDipinjamModel(
    val result: List<BarangDipinjamModel.Data>

) {
    data class Data(val id: String?, val id_barang: String?, val id_user: String?, val nama_barang: String?, val peminjam: String?,val telpon: String?,val jml_barang: String?,val tgl_pinjam: String?,val tgl_kembali: String?)
}