package it.andreacioni.kp2a.plugin.keelink.asynctask;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.util.Log;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;

import it.andreacioni.kp2a.plugin.keelink.R;
import it.andreacioni.kp2a.plugin.keelink.keelink.KeeLinkUtils;
import it.andreacioni.kp2a.plugin.keelink.keelink.KeelinkDefs;
import it.andreacioni.kp2a.plugin.keelink.preferences.KeelinkPreferences;
import keepass2android.pluginsdk.KeepassDefs;

public class RecentActivityLoader extends AsyncTask<Void,Void,Void> {

    private static final String TAG = RecentActivityLoader.class.getSimpleName();

    private ProgressDialog dialog = null;

    private List<Map<String,String>> data =  null;

    private Context ctx = null;

    private ListView listView = null;

    public RecentActivityLoader(Context ctx,ListView vList) {
        this.dialog = KeeLinkUtils.setupProgressDialog(ctx);
        this.ctx = dialog.getContext();
        this.listView = vList;
    }

    @Override
    protected void onPreExecute() {
        data = new ArrayList<>();
        dialog.show();

        listView.clearChoices();
    }

    @Override
    protected Void doInBackground(Void... voids) {

        String jsonPref = KeelinkPreferences.getString(ctx, KeelinkPreferences.RECENT_PREFERENCES_ENTRY);
        JSONArray jsonArray;

        Log.d(TAG,"Recent array:" + jsonPref.toString());

        try {
            jsonArray = new JSONArray(jsonPref);

            for(int i=0;i<jsonArray.length();i++) {
                JSONObject obj = jsonArray.getJSONObject(i);

                Iterator<String> iter = obj.keys();
                Map<String,String> map = new HashMap<String,String>();
                while(iter.hasNext()) {
                    String key = iter.next();
                    map.put(key, (key.equals(KeepassDefs.TitleField)?"":(key + ": ")) + (obj.getString(key).equals("")?KeelinkDefs.STR_NOT_SUPPLIED:obj.getString(key)));
                }

                data.add(map);
            }
        } catch (JSONException e) {
            Log.e(TAG,"Error parsing data of preferences: " + e.getMessage());
        }

        return null;
    }

    @Override
    protected void onPostExecute(Void aVoid) {

        prepareList();

        dialog.cancel();
        dialog.dismiss();
    }

    private void prepareList() {
        boolean listEnabled = true;

        if(data.isEmpty()) {
            HashMap placeholder = new HashMap<String, String>();
            placeholder.put(KeepassDefs.TitleField,"No recents");
            placeholder.put(KeepassDefs.UserNameField,"Your sent history will be available here,");
            placeholder.put(KeepassDefs.UrlField,"click on link button to open Keepass2Android");
            placeholder.put(KeelinkDefs.GUID_FIELD,"0");

            data.add(placeholder);
            listEnabled = false;
        }

        Log.d(TAG,"Data array: " + data.toString());

        SimpleAdapter adapter = new SimpleAdapter(ctx, data, R.layout.recent_list_row, new String[] { KeepassDefs.TitleField,KeepassDefs.UserNameField,KeepassDefs.UrlField },
                new int[] { R.id.recent_row_title, R.id.recent_row_user, R.id.recent_row_url });
        listView.setAdapter(adapter);

        listView.invalidateViews();
        listView.requestLayout();

        listView.setEnabled(listEnabled);

        Log.d(TAG,"List reloaded");
    }
}