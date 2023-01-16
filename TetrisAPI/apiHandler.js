async function login(username, password) {
    let url = 'http://localhost:8888/REST_API/login.php';
    let data = { 'username': username, 'passwd': password };

    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}


async function register(username, email, password) {
    let url = 'http://localhost:8888/REST_API/registration.php';
    let data = { 'username': username, 'passwd': password, 'email': email };

    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}

async function getAllScores() {
    let url = 'http://localhost:8888/REST_API/scores.php';

    let result = await fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}

async function getUsersScores(userId) {
    let url = 'http://localhost:8888/REST_API/scores.php';
    let data = { 'userId': userId };

    let result = await fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}

async function getMaxScore() {
    let url = 'http://localhost:8888/REST_API/scores.php';
    let data = { 'maxScore': 1 };

    let result = await fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}


async function postNewScore(userId, score, lines) {
    let url = 'http://localhost:8888/REST_API/scores.php';
    let data = { 'userId': userId, 'score': score, 'lines': lines };

    let result = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if (result.ok) {
        return JSON.parse(result.body);
    }
    else {
        return 'HTTP error:`${result.status}`';
    }
}