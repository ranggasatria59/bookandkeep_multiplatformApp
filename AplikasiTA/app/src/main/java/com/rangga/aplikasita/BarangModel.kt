package com.rangga.aplikasita

import java.io.Serializable

data class BarangModel (
    val result: List<Data>

    ){
    data class Data(val id_barang: String?,val nama_barang: String?, val stok_barang: String?) : Serializable
}
