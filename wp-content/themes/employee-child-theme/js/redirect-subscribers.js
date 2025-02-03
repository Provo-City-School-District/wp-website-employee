(function () {
  if (typeof window !== "undefined") {
    // Create a loading screen element
    var loadingScreen = document.createElement("div");
    loadingScreen.id = "loading-screen";
    loadingScreen.style.position = "fixed";
    loadingScreen.style.top = "0";
    loadingScreen.style.left = "0";
    loadingScreen.style.width = "100%";
    loadingScreen.style.height = "100%";
    loadingScreen.style.backgroundColor = "#fff";
    loadingScreen.style.zIndex = "9999";
    loadingScreen.style.display = "flex";
    loadingScreen.style.justifyContent = "center";
    loadingScreen.style.alignItems = "center";
    loadingScreen.innerHTML = "<h1>Redirecting...</h1>";

    // Append the loading screen to the body
    document.body.appendChild(loadingScreen);

    // Redirect to the home page
    window.location.href = "/";
  }
})();
