document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('globalSearch');
    const resultsContainer = document.getElementById('searchResults');

    let debounceTimeout;

    const showResults = (show) => {
        if (show) {
            resultsContainer.classList.remove(
                'opacity-0',
                'translate-y-[-10px]',
                'pointer-events-none'
            );
            resultsContainer.classList.add(
                'opacity-100',
                'translate-y-0',
                'pointer-events-auto'
            );
        } else {
            resultsContainer.classList.add(
                'opacity-0',
                'translate-y-[-10px]',
                'pointer-events-none'
            );
            resultsContainer.classList.remove(
                'opacity-100',
                'translate-y-0',
                'pointer-events-auto'
            );
        }
    };

    const fetchResults = async (query) => {
        let endpoint = '';
        let q = '';

        if (query.startsWith('@')) {
            endpoint = '/app/models/recherche-users.php';
            q = query.slice(1);
        } else if (query.startsWith('#')) {
            endpoint = '/app/models/recherche-hashtags.php';
            q = query.slice(1);
        } else return [];

        try {
            const response = await fetch(`${endpoint}?q=${encodeURIComponent(q)}`);


            const data = await response.json();

            if (!response.ok || data.error) {
                throw new Error(data.error || `HTTP error! status: ${response.status}`);
            }

            // Validation renforcée
            if (!Array.isArray(data)) {
                console.warn('Réponse non-array:', data);
                return [];
            }

            return data;

        } catch (error) {
            console.error('Erreur recherche:', error.message);
            return [];
        }
    };





    const formatResults = (data, queryType) => {
        if (queryType === '@') {

            return data.map(user => `
                <a href="/app/views/profile/profil.php?username=${user.username}" 
                    class="flex items-center p-3 hover:bg-gray-100 transition-colors">
                    <img src="https://i.pinimg.com/736x/72/f7/3e/72f73e03e134d091171fc0ff0d3fe5b8.jpg" class="w-8 h-8 rounded-full mr-2">
                    <div>
                        <div class="font-medium">${user.display_name}</div>
                        <div class="text-sm text-gray-500">@${user.username}</div>
                    </div>
                </a>
            `).join('');
        }

        return data.map(hashtag => `
            <a href="/app/views/tag/tag.php?tag=${hashtag.tag.substring(1)}" 
                class="flex items-center p-3 hover:bg-gray-100 transition-colors">
                <div class="text-blue-500 mr-2">#</div>
                <div>
                    <div class="font-medium">${hashtag.tag}</div>
                    <div class="text-sm text-gray-500">${hashtag.usage_count} Posts</div>
                </div>
            </a>
        `).join('');
    };



    const handleInput = async (e) => {
        clearTimeout(debounceTimeout);
        const query = e.target.value.trim();

        debounceTimeout = setTimeout(async () => {
            if (query.length < 1) {
                showResults(false);
                return;
            }



            const data = await fetchResults(query);
            const html = formatResults(data, query[0]);

            resultsContainer.innerHTML = html;
            showResults(html.length > 0);
        }, 300); 
    };


    searchInput.addEventListener('input', handleInput);

    document.addEventListener('click', (e) => {
        if (!e.target.closest('#globalSearch') && !e.target.closest('#searchResults')) {
            showResults(false);
        }
    });
});