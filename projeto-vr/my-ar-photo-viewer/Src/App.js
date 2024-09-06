import React from 'react';
import { ViroARSceneNavigator } from 'react-viro';
import ARPhotoViewer from './components/ARPhotoViewer';

function App() {
  return (
    <ViroARSceneNavigator
      initialScene={{ scene: ARPhotoViewer }}
      style={{ flex: 1 }}
    />
  );
}

export default App;
