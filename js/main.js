const ratingForm = document.getElementById("ratingForm");

if (ratingForm) {
    ratingForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        const rating = document.querySelector("[name='rating']").value;
        const id = document.querySelector("[name='id_pesanan']").value;

        const response = await fetch("/api/rating", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                id,
                rating
            })
        });

        const result = await response.json();
        alert(result.message);
    });
}
