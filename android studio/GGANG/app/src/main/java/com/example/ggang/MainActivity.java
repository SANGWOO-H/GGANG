package com.example.ggang;

import androidx.appcompat.app.AppCompatActivity;

import android.content.ComponentName;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.content.pm.ResolveInfo;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.util.Log;
import android.view.KeyEvent;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageButton;

public class MainActivity extends AppCompatActivity {

    private WebView mWebView;

    private BackKeyClickHandler backKeyClickHandler;

    MediaPlayer mediaPlayer;

    ImageButton startButton;
    ImageButton stopButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mWebView = (WebView) findViewById(R.id.webView);//xml 자바코드 연결
        mWebView.getSettings().setJavaScriptEnabled(true);//자바스크립트 허용
        mWebView.loadUrl("http://192.168.219.132/");//웹뷰 실행
        mWebView.setWebChromeClient(new WebChromeClient());
        mWebView.setWebViewClient(new WebViewClientClass());

        ImageButton camera = (ImageButton)findViewById(R.id.camera);
        camera.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent i = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
                try {
                    PackageManager pm = getPackageManager();

                    final ResolveInfo mInfo = pm.resolveActivity(i, 0);

                    Intent intent = new Intent();
                    intent.setComponent(new ComponentName(mInfo.activityInfo.packageName, mInfo.activityInfo.name));
                    intent.setAction(Intent.ACTION_MAIN);
                    intent.addCategory(Intent.CATEGORY_LAUNCHER);

                    startActivity(intent);
                } catch (Exception e) {
                    Log.i("TAG", "Unable to launch camera: " + e);
                }
            }
        }); //카메라 연동

        startButton = findViewById(R.id.start);
        stopButton = findViewById(R.id.stop);


        startButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mediaPlayer = MediaPlayer.create(MainActivity.this, R.raw.music);
                mediaPlayer.start();
            }
        });

        stopButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mediaPlayer.stop();
                mediaPlayer.reset();
            }
        });

        backKeyClickHandler = new BackKeyClickHandler(this); //뒤로가기 버튼

        mWebView.setWebChromeClient(new FullscreenableChromeClient(MainActivity.this));
    }

    private class WebViewClientClass extends WebViewClient {//페이지 이동
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            Log.d("check URL",url);
            view.loadUrl(url);
            return true;
        }
    }

    @Override public void onBackPressed() {
        //super.onBackPressed();
        backKeyClickHandler.onBackPressed();
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {//뒤로가기 버튼 이벤트
        if ((keyCode == KeyEvent.KEYCODE_BACK) && mWebView.canGoBack()) {//웹뷰에서 뒤로가기 버튼을 누르면 뒤로가짐
            mWebView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }
}