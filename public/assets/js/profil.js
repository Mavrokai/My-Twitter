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

    function handleFollowModal() {
        const followersCounter = document.getElementById('followers-counter');
        const followingCounter = document.getElementById('following-counter');
        const followModal = document.getElementById('followModal');
        const closeFollowModal = document.getElementById('closeFollowModal');
        const followersList = document.getElementById('followersList');
        const followingList = document.getElementById('followingList');
        const modalTitle = document.getElementById('modalTitle');

        if (!followersCounter || !followingCounter || !followModal || !closeFollowModal || !modalTitle) return;

        followersCounter.addEventListener('click', () => {
            modalTitle.textContent = 'Abonnés';
            followersList.classList.remove('hidden');
            followingList.classList.add('hidden');
            followModal.classList.remove('hidden');
        });

        followingCounter.addEventListener('click', () => {
            modalTitle.textContent = 'Suivis';
            followingList.classList.remove('hidden');
            followersList.classList.add('hidden');
            followModal.classList.remove('hidden');
        });

        closeFollowModal.addEventListener('click', () => {
            followModal.classList.add('hidden');
        });

        window.addEventListener('click', (e) => {
            if (e.target === followModal) {
                followModal.classList.add('hidden');
            }
        });
    }



    document.addEventListener('click', (e) => {


        if (e.target.classList.contains('reply-btn')) {
            const postId = e.target.dataset.postId;
            const username = e.target.dataset.username;
            const form = e.target.closest('.flex-1').querySelector('.reply-form');
            const textarea = form.querySelector('textarea');

            form.classList.remove('hidden');
            textarea.focus();
            textarea.value = `@${username} `;
        }


        if (e.target.classList.contains('cancel-reply')) {
            const form = e.target.closest('.reply-form');
            form.classList.add('hidden');
            form.querySelector('textarea').value = '';
        }
    });


    document.querySelectorAll('.reply-form textarea').forEach(textarea => {
        textarea.addEventListener('input', function (e) {
            const match = this.value.match(/@(\w*)$/);
            if (match) {
                const query = match[1];
                fetch(`../../controllers/recherche-users.php?query=${query}`)
                    .then(response => response.json())
                    .then(users => {

                        console.log('Suggestions:', users);
                    });
            }
        });
    });

    function handleRetweetButtons() {
        document.querySelectorAll('.retweet-btn').forEach(button => {
            button.addEventListener('click', async function (e) {
                e.preventDefault();
                const postId = this.dataset.postId;

                try {
                    const response = await fetch('../../controllers/RetweetController.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ post_id: postId })
                    });

                    const result = await response.json();

                    if (result.success) {
                        this.textContent = 'Retweeté';
                        this.disabled = true;

                    } else {
                        alert('Erreur: ' + result.error);
                    }
                } catch (error) {
                    console.error('Erreur:', error);
                }
            });
        });
    }


    


    function init() {
        handleRetweetButtons();
        handleFollowModal();
        handleLikeButtons();
        handleEditProfileModal();
        handlePostModal();
        handleImagePreview();
        handleFlashMessages();
        handleFollowButtons();
    }

    init();
});