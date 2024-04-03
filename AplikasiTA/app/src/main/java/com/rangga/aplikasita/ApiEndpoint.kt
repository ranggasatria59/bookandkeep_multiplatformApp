package com.rangga.aplikasita

import retrofit2.Call
import retrofit2.http.Field
import retrofit2.http.FormUrlEncoded
import retrofit2.http.GET
import retrofit2.http.POST


interface ApiEndpoint {
    @GET("read-barang-android.php")
    fun data() : Call<BarangModel>

    @GET("read-permintaan-android.php")
    fun permintaan() : Call<PinjamModel>

    @GET("read-barang-dipinjam.php")
    fun barangdipinjam() : Call<PinjamModel>

    @GET("read-barang-kembali.php")
    fun barangkembali() : Call<PinjamModel>

    @GET("read-transaksi-selesai.php")
    fun transaksi_selesai() : Call<PinjamModel>

    @FormUrlEncoded
    @POST("tambah-barang-android.php")
    fun create(
        @Field("nama_barang") nama_barang: String,
        @Field("stok_barang") stok_barang: String
    ) : Call<SubmitModel>

    @FormUrlEncoded
    @POST("update-barang-android.php")
    fun update(
        @Field("id_barang") id: String,
        @Field("nama_barang") nama_barang: String,
        @Field("stok_barang") stok_barang: String,

    ) : Call<SubmitModel>

    @FormUrlEncoded
    @POST("delete-barang-android.php")
    fun delete(
        @Field("id_barang") id: String
        ) : Call<SubmitModel>

    @FormUrlEncoded
    @POST("proses-pinjam-android.php")
    fun terimaPinjaman(
        @Field("id") id: String
    ) : Call<SubmitModel>

    @FormUrlEncoded
    @POST("proses-kembali-android.php")
    fun terimaKembali(
        @Field("id") id: String
    ) : Call<SubmitModel>

}