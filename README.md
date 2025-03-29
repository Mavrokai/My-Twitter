<div id="top">

<!-- HEADER STYLE: CLASSIC -->
<div align="center">


# MY-TWITTER

<em>Connect, Share, Engage: Your Voice Amplified</em>

<!-- BADGES -->
<img src="https://img.shields.io/github/last-commit/Mavrokai/My-Twitter?style=flat&logo=git&logoColor=white&color=0080ff" alt="last-commit">
<img src="https://img.shields.io/github/languages/top/Mavrokai/My-Twitter?style=flat&color=0080ff" alt="repo-top-language">
<img src="https://img.shields.io/github/languages/count/Mavrokai/My-Twitter?style=flat&color=0080ff" alt="repo-language-count">

<em>Built with the tools and technologies:</em>

<img src="https://img.shields.io/badge/JSON-000000.svg?style=flat&logo=JSON&logoColor=white" alt="JSON">
<img src="https://img.shields.io/badge/npm-CB3837.svg?style=flat&logo=npm&logoColor=white" alt="npm">
<img src="https://img.shields.io/badge/Autoprefixer-DD3735.svg?style=flat&logo=Autoprefixer&logoColor=white" alt="Autoprefixer">
<img src="https://img.shields.io/badge/PostCSS-DD3A0A.svg?style=flat&logo=PostCSS&logoColor=white" alt="PostCSS">
<img src="https://img.shields.io/badge/Composer-885630.svg?style=flat&logo=Composer&logoColor=white" alt="Composer">
<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=flat&logo=JavaScript&logoColor=black" alt="JavaScript">
<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=flat&logo=PHP&logoColor=white" alt="PHP">

</div>
<br>

---

## Table of Contents

- [Overview](#overview)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
    - [Usage](#usage)
    - [Testing](#testing)

---

## Overview

My-Twitter is a powerful developer tool designed to create a dynamic social media experience, enabling seamless user interactions and content sharing.

**Why My-Twitter?**

This project empowers developers to build engaging social platforms with robust features and intuitive design. The core features include:

- 🎨 **Responsive Design:** Streamlined styling process with Tailwind CSS for a consistent user experience across devices.
- 🔒 **User Authentication Management:** Secure registration and login processes to maintain user data integrity.
- 🗨️ **Dynamic Content Interaction:** Features like tweet creation, retweeting, and following enhance user engagement.
- 🌈 **Customizable Themes:** Dark mode and tailored color themes for a personalized user experience.
- 📡 **Robust API for Data Retrieval:** Efficient handling of user follow relationships and hashtag searches.
- 🖼️ **Seamless Media Management:** Easy retrieval and display of media files to enrich content sharing.

---

### Project Index

<details open>
	<summary><b><code>MY-TWITTER/</code></b></summary>
	<!-- __root__ Submodule -->
	<details>
		<summary><b>__root__</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ __root__</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/package.json'>package.json</a></b></td>
					<td style='padding: 8px;'>- Defines the project configuration for yjungle, outlining its dependencies and development scripts<br>- It facilitates the integration of Tailwind CSS for styling, enabling a streamlined development process with a focus on responsive design<br>- The setup supports efficient asset management and prepares the codebase for further enhancements, ensuring a solid foundation for building user interfaces.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/tailwind.config.js'>tailwind.config.js</a></b></td>
					<td style='padding: 8px;'>- Customization of Tailwind CSS configurations enhances the projects styling capabilities, enabling a dark mode feature and tailored color themes<br>- By specifying content sources, it ensures that styles are applied consistently across various file types within the codebase<br>- This configuration supports a cohesive design experience, allowing for dynamic adjustments to background, text, and border colors based on user preferences.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/composer.json'>composer.json</a></b></td>
					<td style='padding: 8px;'>- Facilitates environment variable management by incorporating the vlucas/phpdotenv library, enabling seamless configuration of application settings<br>- This integration enhances the overall architecture by promoting a clean separation of environment-specific variables from the codebase, thereby improving security and maintainability<br>- It supports the projects goal of creating a robust and flexible application environment.</td>
				</tr>
			</table>
		</blockquote>
	</details>
	<!-- app Submodule -->
	<details>
		<summary><b>app</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ app</b></code>
			<!-- controllers Submodule -->
			<details>
				<summary><b>controllers</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ app.controllers</b></code>
					<table style='width: 100%; border-collapse: collapse;'>
					<thead>
						<tr style='background-color: #f8f9fa;'>
							<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
							<th style='text-align: left; padding: 8px;'>Summary</th>
						</tr>
					</thead>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/TweetController.php'>TweetController.php</a></b></td>
							<td style='padding: 8px;'>- Handles the creation and management of tweets within the application<br>- It processes user input for tweet content and optional media uploads, ensuring validation and error handling<br>- Upon successful submission, it directs users back to their profile or the previous page, while also retrieving and displaying the users existing posts<br>- This functionality is integral to the user experience, enabling interaction and engagement on the platform.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/FollowController.php'>FollowController.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates user follow functionality within the application by managing follow and unfollow actions<br>- It verifies user authentication, processes incoming requests to toggle follow status, and retrieves updated counts of followers and following for the authenticated user<br>- This controller plays a crucial role in enhancing user interaction and engagement in the social networking aspect of the project.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/HomeController.php'>HomeController.php</a></b></td>
							<td style='padding: 8px;'>- HomeController orchestrates user interactions within the application by managing session states and ensuring authenticated access<br>- It retrieves the current users timeline posts, random users for engagement, and follower/following statistics, thereby enhancing the user experience<br>- By providing essential data for the view layer, it supports the overall functionality of the platform, fostering social connections and content sharing among users.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/get_follows.php'>get_follows.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates the retrieval of user follow relationships within the application<br>- By processing requests for either followers or following lists based on user input, it ensures that valid session data is present before querying the database<br>- The output is returned in JSON format, providing a structured response for frontend consumption, thereby enhancing user interaction with the social features of the platform.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/AuthController.php'>AuthController.php</a></b></td>
							<td style='padding: 8px;'>- AuthController manages user authentication processes within the application, facilitating both registration and login functionalities<br>- It ensures that user input is validated, checks for existing accounts, and securely handles password verification<br>- By integrating with the user model and session management, it plays a crucial role in maintaining user sessions and directing users to appropriate views based on their authentication status, thereby enhancing the overall user experience.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/ProfileController.php'>ProfileController.php</a></b></td>
							<td style='padding: 8px;'>- Manages user profile interactions within the application, enabling users to view and update their profiles securely<br>- It retrieves user data based on the provided username or defaults to the logged-in users profile<br>- Additionally, it handles profile updates, ensuring data validation and uniqueness, while also fetching relevant user statistics and posts for display<br>- This functionality is essential for enhancing user engagement and personalization in the overall application architecture.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/RetweetController.php'>RetweetController.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates the retweeting functionality within the application by handling user requests to share posts<br>- It ensures that users are authenticated before allowing retweets, processes incoming data to retrieve the relevant post ID, and returns a JSON response indicating the success or failure of the operation<br>- This controller plays a crucial role in enhancing user engagement by enabling content sharing across the platform.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/controllers/HashtagController.php'>HashtagController.php</a></b></td>
							<td style='padding: 8px;'>- Handles the retrieval and display of posts associated with a specific hashtag within the application<br>- It ensures that users are authenticated before accessing the hashtag content, processes the hashtag for consistency, and enriches the post data by indicating whether each post has been retweeted by the user<br>- Additionally, it prepares user-specific information for a personalized experience on the hashtag page.</td>
						</tr>
					</table>
				</blockquote>
			</details>
			<!-- config Submodule -->
			<details>
				<summary><b>config</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ app.config</b></code>
					<table style='width: 100%; border-collapse: collapse;'>
					<thead>
						<tr style='background-color: #f8f9fa;'>
							<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
							<th style='text-align: left; padding: 8px;'>Summary</th>
						</tr>
					</thead>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/config/config.php'>config.php</a></b></td>
							<td style='padding: 8px;'>- Configuration management is facilitated through the establishment of database connectivity and error handling<br>- By loading environment variables, it ensures secure access to database credentials while enabling robust error reporting<br>- This foundational setup supports the overall architecture by allowing seamless interaction with the database, thereby enhancing the applications reliability and maintainability within the broader codebase.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/config/configMAC.php'>configMAC.php</a></b></td>
							<td style='padding: 8px;'>- Establishes a database connection for the application by utilizing environment variables to configure connection parameters<br>- It ensures error reporting is enabled for development purposes and employs PDO for secure database interactions<br>- This foundational setup is crucial for the overall architecture, enabling seamless data access and manipulation throughout the codebase, thereby supporting the applications functionality and performance.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/config/My_Twitter.sql'>My_Twitter.sql</a></b></td>
							<td style='padding: 8px;'>- Defines the database schema and initial data for the My_Twitter application, facilitating user interactions, content sharing, and social networking features<br>- It establishes essential tables such as Users, Posts, and Follows, along with their relationships, ensuring a structured environment for managing user-generated content and connections<br>- This foundational setup supports the overall architecture of the application, enabling seamless functionality and data integrity.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/config/logout.php'>logout.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates user logout by terminating the current session and redirecting to the authentication view<br>- This functionality is essential for maintaining security and user experience within the application, ensuring that users can safely exit their accounts<br>- It plays a crucial role in the overall architecture by managing session states and enhancing the applications authentication flow.</td>
						</tr>
					</table>
				</blockquote>
			</details>
			<!-- views Submodule -->
			<details>
				<summary><b>views</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ app.views</b></code>
					<!-- tag Submodule -->
					<details>
						<summary><b>tag</b></summary>
						<blockquote>
							<div class='directory-path' style='padding: 8px 0; color: #666;'>
								<code><b>⦿ app.views.tag</b></code>
							<table style='width: 100%; border-collapse: collapse;'>
							<thead>
								<tr style='background-color: #f8f9fa;'>
									<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
									<th style='text-align: left; padding: 8px;'>Summary</th>
								</tr>
							</thead>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/tag/tag.php'>tag.php</a></b></td>
									<td style='padding: 8px;'>- Displays a hashtag page that showcases tweets associated with a specific hashtag<br>- It presents user interactions, including retweeting and replying to posts, while also allowing users to create new posts<br>- The layout features a sidebar for navigation and a responsive design for optimal viewing<br>- Additionally, it incorporates session management for user notifications, enhancing the overall user experience within the application.</td>
								</tr>
							</table>
						</blockquote>
					</details>
					<!-- auth Submodule -->
					<details>
						<summary><b>auth</b></summary>
						<blockquote>
							<div class='directory-path' style='padding: 8px 0; color: #666;'>
								<code><b>⦿ app.views.auth</b></code>
							<table style='width: 100%; border-collapse: collapse;'>
							<thead>
								<tr style='background-color: #f8f9fa;'>
									<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
									<th style='text-align: left; padding: 8px;'>Summary</th>
								</tr>
							</thead>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/auth/inscription.php'>inscription.php</a></b></td>
									<td style='padding: 8px;'>- Facilitates user registration for the Yjungle platform by providing a visually appealing and interactive inscription form<br>- Users can input essential information such as username, full name, date of birth, email, and password, ensuring a smooth onboarding experience<br>- The design incorporates animations and responsive styling, enhancing user engagement while guiding them through the registration process.</td>
								</tr>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/auth/auth.php'>auth.php</a></b></td>
									<td style='padding: 8px;'>- Facilitates user authentication for the Yjungle platform by providing a visually appealing login and registration interface<br>- It includes forms for user login and account creation, enhanced with animations and responsive design elements<br>- This component plays a crucial role in the overall architecture by ensuring secure access to the application, thereby enhancing user engagement and experience within the platform.</td>
								</tr>
							</table>
						</blockquote>
					</details>
					<!-- partials Submodule -->
					<details>
						<summary><b>partials</b></summary>
						<blockquote>
							<div class='directory-path' style='padding: 8px 0; color: #666;'>
								<code><b>⦿ app.views.partials</b></code>
							<table style='width: 100%; border-collapse: collapse;'>
							<thead>
								<tr style='background-color: #f8f9fa;'>
									<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
									<th style='text-align: left; padding: 8px;'>Summary</th>
								</tr>
							</thead>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/partials/sidebar.php'>sidebar.php</a></b></td>
									<td style='padding: 8px;'>- Provides a sidebar navigation component for the application, enhancing user experience by offering quick access to key sections such as Home and Profile<br>- It includes a dropdown menu for additional options, like Logout, and dynamically highlights the current page<br>- This component is integral to the overall user interface, ensuring seamless navigation throughout the application while maintaining a consistent design aesthetic.</td>
								</tr>
							</table>
						</blockquote>
					</details>
					<!-- profile Submodule -->
					<details>
						<summary><b>profile</b></summary>
						<blockquote>
							<div class='directory-path' style='padding: 8px 0; color: #666;'>
								<code><b>⦿ app.views.profile</b></code>
							<table style='width: 100%; border-collapse: collapse;'>
							<thead>
								<tr style='background-color: #f8f9fa;'>
									<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
									<th style='text-align: left; padding: 8px;'>Summary</th>
								</tr>
							</thead>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/profile/profil.php'>profil.php</a></b></td>
									<td style='padding: 8px;'>The profile page dynamically displays the username and associated profile data, enhancing user engagement.-<strong>Session ManagementIt initiates session handling to maintain user state across the application.-</strong>Responsive DesignThe layout is designed to be responsive, ensuring a consistent experience across various devices.-**Integration with Other ComponentsThe file includes partial views, such as the sidebar, to maintain a cohesive user interface throughout the application.In summary, <code>profil.php</code> is an essential part of the codebase that enhances user experience by providing a dedicated space for users to view and manage their profiles, while also ensuring that the application remains organized and maintainable.</td>
								</tr>
							</table>
						</blockquote>
					</details>
					<!-- home Submodule -->
					<details>
						<summary><b>home</b></summary>
						<blockquote>
							<div class='directory-path' style='padding: 8px 0; color: #666;'>
								<code><b>⦿ app.views.home</b></code>
							<table style='width: 100%; border-collapse: collapse;'>
							<thead>
								<tr style='background-color: #f8f9fa;'>
									<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
									<th style='text-align: left; padding: 8px;'>Summary</th>
								</tr>
							</thead>
								<tr style='border-bottom: 1px solid #eee;'>
									<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/views/home/home.php'>home.php</a></b></td>
									<td style='padding: 8px;'>- Facilitates the rendering of the home page within the application, providing users with a dynamic interface to view and interact with posts<br>- It integrates session management for user notifications, displays user-generated content, and allows for post interactions such as replies and retweets<br>- Additionally, it incorporates a sidebar for user navigation and a modal for creating new posts, enhancing overall user engagement within the platform.</td>
								</tr>
							</table>
						</blockquote>
					</details>
				</blockquote>
			</details>
			<!-- models Submodule -->
			<details>
				<summary><b>models</b></summary>
				<blockquote>
					<div class='directory-path' style='padding: 8px 0; color: #666;'>
						<code><b>⦿ app.models</b></code>
					<table style='width: 100%; border-collapse: collapse;'>
					<thead>
						<tr style='background-color: #f8f9fa;'>
							<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
							<th style='text-align: left; padding: 8px;'>Summary</th>
						</tr>
					</thead>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/UserModify.php'>UserModify.php</a></b></td>
							<td style='padding: 8px;'>- UserModify.php facilitates user management within the application by providing essential functions for retrieving, updating, and validating user information<br>- It enables the retrieval of user details by ID or username, checks for existing users, and processes user-generated content to create interactive links for mentions and tags<br>- This module plays a crucial role in enhancing user experience and maintaining data integrity across the codebase.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/Follow.php'>Follow.php</a></b></td>
							<td style='padding: 8px;'>- Manages user follow relationships within the application, enabling functionalities such as tracking followers and following counts, retrieving lists of followers and followed users, and allowing users to toggle their follow status<br>- This module enhances user engagement by facilitating social interactions, contributing to the overall architecture of a dynamic user-centric platform.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/recherche-hashtags.php'>recherche-hashtags.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates the retrieval of hashtag data based on user input, enhancing the search functionality within the application<br>- By querying the database for hashtags that match the users query, it provides insights into hashtag usage and recency, thereby supporting users in discovering trending topics<br>- This component plays a crucial role in the overall architecture by connecting user interactions with the underlying data model.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/recherche-users.php'>recherche-users.php</a></b></td>
							<td style='padding: 8px;'>- Facilitates user search functionality within the application by querying the database for users whose usernames or display names match a given search term<br>- It retrieves relevant user information, including user IDs, usernames, display names, and post counts, and returns the top results in a JSON format<br>- This component enhances user experience by enabling quick access to user profiles based on search criteria.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/User.php'>User.php</a></b></td>
							<td style='padding: 8px;'>- User management functionality is provided, enabling the creation and verification of user accounts within the application<br>- It ensures that usernames and emails are unique during registration, securely hashes passwords, and facilitates user retrieval by email<br>- This component plays a crucial role in the overall architecture by supporting user authentication and data integrity, essential for a seamless user experience in the project.</td>
						</tr>
						<tr style='border-bottom: 1px solid #eee;'>
							<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/app/models/Tweet.php'>Tweet.php</a></b></td>
							<td style='padding: 8px;'>- Manages tweet-related functionalities within the application, enabling users to create, retrieve, and interact with posts<br>- It facilitates the display of a users timeline, individual posts, and posts associated with specific hashtags<br>- Additionally, it supports retweeting and tracking replies, enhancing user engagement and content discovery in the social media ecosystem<br>- This module is integral to the overall architecture, ensuring seamless interaction with the database for tweet management.</td>
						</tr>
					</table>
				</blockquote>
			</details>
		</blockquote>
	</details>
	<!-- public Submodule -->
	<details>
		<summary><b>public</b></summary>
		<blockquote>
			<div class='directory-path' style='padding: 8px 0; color: #666;'>
				<code><b>⦿ public</b></code>
			<table style='width: 100%; border-collapse: collapse;'>
			<thead>
				<tr style='background-color: #f8f9fa;'>
					<th style='width: 30%; text-align: left; padding: 8px;'>File Name</th>
					<th style='text-align: left; padding: 8px;'>Summary</th>
				</tr>
			</thead>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/public/index.php'>index.php</a></b></td>
					<td style='padding: 8px;'>- Serves as the entry point for the web application, directing incoming requests to the appropriate controllers and handling routing<br>- It plays a crucial role in initializing the application environment and ensuring that user interactions are processed efficiently<br>- By managing the flow of data and user requests, it integrates seamlessly with the overall architecture, facilitating a smooth user experience across the platform.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/public/.htacces'>.htacces</a></b></td>
					<td style='padding: 8px;'>- Facilitates URL rewriting and access control for the web application, enhancing security and user experience<br>- By managing how requests are processed, it ensures that users are directed to the appropriate resources while preventing unauthorized access<br>- This component plays a crucial role in maintaining the overall integrity and functionality of the project’s architecture.</td>
				</tr>
				<tr style='border-bottom: 1px solid #eee;'>
					<td style='padding: 8px;'><b><a href='https://github.com/Mavrokai/My-Twitter/blob/master/public/get_image.php'>get_image.php</a></b></td>
					<td style='padding: 8px;'>- Facilitates the retrieval and delivery of media files based on a provided short URL<br>- By querying the database for the corresponding file name, it ensures that only valid and existing files are served to the user<br>- This functionality enhances the overall user experience by allowing seamless access to media content within the application, contributing to the projects goal of efficient media management.</td>
				</tr>
			</table>
		</blockquote>
	</details>
</details>

---

## Getting Started

### Prerequisites

This project requires the following dependencies:

- **Programming Language:** PHP
- **Package Manager:** Npm, Composer

### Installation

Build My-Twitter from the source and intsall dependencies:

1. **Clone the repository:**

    ```sh
    ❯ git clone https://github.com/Mavrokai/My-Twitter
    ```

2. **Navigate to the project directory:**

    ```sh
    ❯ cd My-Twitter
    ```

3. **Install the dependencies:**

**Using [npm](https://www.npmjs.com/):**

```sh
❯ npm install
```
**Using [composer](https://www.php.net/):**

```sh
❯ composer install
```

### Usage

Run the project with:

**Using [npm](https://www.npmjs.com/):**

```sh
npm start
```
**Using [composer](https://www.php.net/):**

```sh
php {entrypoint}
```

### Testing

My-twitter uses the {__test_framework__} test framework. Run the test suite with:

**Using [npm](https://www.npmjs.com/):**

```sh
npm test
```
**Using [composer](https://www.php.net/):**

```sh
vendor/bin/phpunit
```

---

<div align="left"><a href="#top">⬆ Return</a></div>

---
