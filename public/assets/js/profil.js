document.addEventListener("DOMContentLoaded", function () {






    // Fonctionnalité des likes
    function handleLikeButtons() {
        const likeButtons = document.querySelectorAll(".like-btn");

        likeButtons.forEach(button => {
            let count = 0;
            const likeCount = button.querySelector(".like-count");

            button.addEventListener("click", function () {
                count++;
                likeCount.textContent = count;
                button.classList.toggle("bg-red-500");
                button.classList.toggle("text-white");
            });
        });
    }






    // Gestion modale d'édition de profil
    function handleEditProfileModal() {
        const openEditModal = document.getElementById("openEditModal");
        const closeEditModal = document.getElementById("closeEditModal");
        const editProfileModal = document.getElementById("editProfileModal");

        if (!openEditModal || !closeEditModal || !editProfileModal) return;

        const openModal = () => editProfileModal.classList.remove("hidden");
        const closeModal = () => editProfileModal.classList.add("hidden");
        const outsideClick = (e) => e.target === editProfileModal && closeModal();

        openEditModal.addEventListener("click", openModal);
        closeEditModal.addEventListener("click", closeModal);
        window.addEventListener("click", outsideClick);
    }




    // Gestion modale de création de tweet
    function handlePostModal() {
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");
        const postModal = document.getElementById("postModal");

        if (!openModalBtn || !closeModalBtn || !postModal) return;

        const openModal = () => postModal.classList.remove("hidden");
        const closeModal = () => postModal.classList.add("hidden");
        const outsideClick = (e) => e.target === postModal && closeModal();

        openModalBtn.addEventListener("click", openModal);
        closeModalBtn.addEventListener("click", closeModal);
        window.addEventListener("click", outsideClick);


        // Ajouter la gestion du compteur
        const tweetContent = document.getElementById('tweetContent');
        const charCount = document.getElementById('charCount');

        if (tweetContent && charCount) {
            tweetContent.addEventListener('input', updateCharCount);

            // Initialiser au chargement
            updateCharCount();

        }
    }



    function updateCharCount() {
        const remaining = 140 - tweetContent.value.length;
        charCount.textContent = remaining;

        // Changement de couleur si nécessaire
        if (remaining < 20) {
            charCount.classList.add('text-red-500');
        } else {
            charCount.classList.remove('text-red-500');
        }
    }




    // Preview d'image pour le tweet
    function handleImagePreview() {
        const imageUpload = document.getElementById("imageUpload");
        const imagePreview = document.getElementById("imagePreview");
        const previewImg = document.getElementById("previewImg");

        if (!imageUpload || !imagePreview || !previewImg) return;

        imageUpload.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add("hidden");
            }
        });
    }




    // Gestion des messages session flash 
    function handleFlashMessages() {
        document.querySelectorAll('[role="alert"]').forEach(alert => {
            setTimeout(() => alert.remove(), 5000); // en milliseconde
        });
    }



    //btn follow deviens btn suivi, et envoie de la requete pour la mise à jour du statut de suivi
    function handleFollowButtons() {


        document.querySelectorAll('.follow-btn').forEach(button => {

            button.addEventListener('click', async function () {
                const userId = this.dataset.userId;

                try {

                    const response = await fetch('../../controllers/FollowController.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({ user_id: userId })
                    });

                    const result = await response.json();

                    if (result.success) {


                        this.textContent = result.status === 'followed' ? 'Suivi' : 'Suivre';
                        this.classList.toggle('bg-[#59713E]');
                        this.classList.toggle('text-white');
                        this.classList.toggle('bg-gray-300');



                        document.getElementById('following-count').textContent = result.following;
                        document.getElementById('followers-count').textContent = result.followers;
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                }
            });
        });
    }

    function modalpreviewsFollowsFollower() {
        const following = document.getElementById('following-counter');
        const followers = document.getElementById('followers-counter');

        following.addEventListener('click', function () {
            const modal = document.getElementById('editProfileModal');

            if (modal.style = 'display: none;') {
                modal.style = 'display: block;';
            } else {
                modal.style = 'display: none;';
            }
        })


        followers.addEventListener('click', function () {
            const modal = document.getElementById('editProfileModal');

            if (modal.style = 'display: none;') {
                modal.style = 'display: block;';
            } else {
                modal.style = 'display: none;';
            }
        })

    }


    function init() {
        modalpreviewsFollowsFollower();
        handleLikeButtons();
        handleEditProfileModal();
        handlePostModal();
        handleImagePreview();
        handleFlashMessages();
        handleFollowButtons();
    }

    init();
});