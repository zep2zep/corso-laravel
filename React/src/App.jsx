import { useState, useEffect } from 'react';
import axios from 'axios';
import {
    BrowserRouter as Router,
    Route,
    Routes,
    Link,
    useParams,
} from 'react-router-dom';

import './App.css';

const PostList = () => {
    const [posts, setPosts] = useState([]);

    useEffect(() => {
        axios
            .get('http://127.0.0.1:8000/api/posts')
            .then((response) => {
                setPosts(response.data);
            })
            .catch((error) => {
                console.error('Errore nel recupero dei post', error);
            });
    }, []);

    return (
        <div>
            <h1>Lista dei post</h1>
            <ul>
                {posts.map((post) => (
                    <li key={post.id}>
                        <Link to={`/posts/${post.id}`}>{post.title}</Link>
                    </li>
                ))}
            </ul>
        </div>
    );
};

const PostDetail = () => {
    const { id } = useParams();
    const [post, setPost] = useState(null);
    //http://localhost:5173/posts/5
    useEffect(() => {
        axios
            .get(`http://127.0.0.1:8000/api/posts/${id}`)
            .then((response) => {
                setPost(response.data);
            })
            .catch((error) => {
                console.error('Errore nel caricamento del post', error);
            });
    }, [id]);

    if (!post) {
        return <div>CNon trovato</div>;
    }
    return (
        <div>
            <h1>{post.title}</h1>
            <p>{post.content}</p>
        </div>
    );
};

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<PostList />} />
                <Route path="/posts/:id" element={<PostDetail />} />
            </Routes>
        </Router>
    );
}

export default App;
