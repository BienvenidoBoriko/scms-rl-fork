import config from "./config";

export const getPosts = async () => {
  return await fetch(`${config.apiUrl}posts`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error al obtener los posts" };
    }
  });
};

export const getPost = async (id) => {
  return await fetch(`${config.apiUrl}posts/${id}`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error no se ha encontrado el post" };
    }
  });
};

export const getTags = async () => {
  return await fetch(`${config.apiUrl}tags`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error al obtener los tags" };
    }
  });
};

export const getTag = async (id) => {
  return await fetch(`${config.apiUrl}tags/${id}`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error al obtener el tag" };
    }
  });
};

export const getCategories = async () => {
  return await fetch(`${config.apiUrl}categories`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error al obtener las categorias" };
    }
  });
};

export const getCategory = async (id) => {
  return await fetch(`${config.apiUrl}categories/${id}`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error no se ha encontrado la categoria" };
    }
  });
};

export const getSettings = async () => {
  return await fetch(`${config.apiUrl}settings`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "Error al obtener los ajustes" };
    }
  });
};

export const getSetting = async (id) => {
  return await fetch(`${config.apiUrl}settings/${id}`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "No se ha encontrado el ajuste" };
    }
  });
};

export const getUser = async (id) => {
  return await fetch(`${config.apiUrl}users/${id}`, {
    method: "GET",
    headers: {
      Authorization: "Bearer " + config.token,
      "Content-type": "application/json",
    },
  }).then((res) => {
    if (res.status === 200) {
      return { status: true, data: res.json() };
    } else {
      return { status: false, data: "No se ha encontrado el usuario" };
    }
  });
};
