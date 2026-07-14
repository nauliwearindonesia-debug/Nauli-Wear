import supabase from "../lib/db.js";

export default async function handler(req, res) {

    // Simpan rating baru untuk sebuah produk
    if (req.method === "POST") {

        try {

            const { produk, rating } = req.body;

            if (!produk || !rating) {
                return res.status(400).json({
                    success: false,
                    message: "Data tidak lengkap"
                });
            }

            if (rating < 1 || rating > 5) {
                return res.status(400).json({
                    success: false,
                    message: "Rating harus antara 1-5"
                });
            }

            const { error } = await supabase
                .from("product_ratings")
                .insert([{ produk, rating }]);

            if (error) throw error;

            return res.status(200).json({
                success: true,
                message: "Rating berhasil disimpan"
            });

        } catch (err) {

            console.error(err);

            return res.status(500).json({
                success: false,
                message: err.message
            });

        }

    }

    // Ambil rata-rata rating tiap produk
    if (req.method === "GET") {

        try {

            const { data, error } = await supabase
                .from("product_ratings")
                .select("produk, rating");

            if (error) throw error;

            const grouped = {};

            (data || []).forEach(function (row) {
                if (!grouped[row.produk]) {
                    grouped[row.produk] = { total: 0, count: 0 };
                }
                grouped[row.produk].total += row.rating;
                grouped[row.produk].count += 1;
            });

            const result = Object.keys(grouped).map(function (produk) {
                return {
                    produk,
                    average: Number((grouped[produk].total / grouped[produk].count).toFixed(1)),
                    count: grouped[produk].count
                };
            });

            return res.status(200).json({
                success: true,
                data: result
            });

        } catch (err) {

            console.error(err);

            return res.status(500).json({
                success: false,
                message: err.message
            });

        }

    }

    return res.status(405).json({
        success: false,
        message: "Method tidak diizinkan"
    });

}
