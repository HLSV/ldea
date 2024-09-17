import React, { useState } from 'react';
import { ViroARScene, ViroText, ViroImage } from 'react-viro';

const ARPhotoViewer = () => {
  const [photos, setPhotos] = useState([
    { uri: 'path/to/photo1.jpg', position: [0, 0, -2] },
    { uri: 'path/to/photo2.jpg', position: [1, 0, -3] },
  ]);

  return (
    <ViroARScene>
      {photos.map((photo, index) => (
        <ViroImage
          key={index}
          source={{ uri: photo.uri }}
          position={photo.position}
          scale={[0.5, 0.5, 0.5]}
        />
      ))}
      <ViroText
        text="Visor de Fotos em AR"
        position={[0, 0, -1]}
        style={{ fontSize: 30, color: '#ffffff' }}
      />
    </ViroARScene>
  );
};

export default ARPhotoViewer;
import React, { useState, useEffect } from 'react';
import { ViroARScene, ViroText, ViroImage } from 'react-viro';
import { RTCPeerConnection, RTCSessionDescription } from 'react-native-webrtc';

const ARPhotoViewer = () => {
  const [photos, setPhotos] = useState([
    { uri: 'path/to/photo1.jpg', position: [0, 0, -2] },
    { uri: 'path/to/photo2.jpg', position: [1, 0, -3] },
  ]);

  useEffect(() => {
    const pc = new RTCPeerConnection();

    pc.onicecandidate = (event) => {
      if (event.candidate) {
        // Enviar candidato ICE para o outro peer
      }
    };

    pc.onaddstream = (event) => {
      // Adicionar stream recebida
    };

    pc.createOffer().then((offer) => {
      pc.setLocalDescription(new RTCSessionDescription(offer));
      // Enviar oferta para o outro peer
    });

    // Receber resposta
    // pc.setRemoteDescription(new RTCSessionDescription(answer));
  }, []);

  return (
    <ViroARScene>
      {photos.map((photo, index) => (
        <ViroImage
          key={index}
          source={{ uri: photo.uri }}
          position={photo.position}
          scale={[0.5, 0.5, 0.5]}
        />
      ))}
      <ViroText
        text="Visor de Fotos em AR"
        position={[0, 0, -1]}
        style={{ fontSize: 30, color: '#ffffff' }}
      />
    </ViroARScene>
  );
};

export default ARPhotoViewer;
